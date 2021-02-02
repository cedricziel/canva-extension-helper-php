# Canva.com extensions with  PHP

Some utilities for building canva extensions.

## Usage

### Installation

Via composer:

```
composer require cedricziel/canva-extension-helper
```

### With Symfony

Symfony projects usually come with a fully configured serializer and a configured http server layer.

The following Symfony controller is enough for a "Publish" extension with the `basic` layout:

```php
<?php

namespace App\Controller\Canva;

use Canva\Error;
use Canva\HttpHelper;
use Canva\Publish\ErrorResponse;
use Canva\Publish\UploadRequest;
use Canva\Publish\UploadResponse;
use Canva\Request as CanvaRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @Route(path="/canva/extensions/publish", name="canva_publish")
 */
class PublishExtensionController extends AbstractController implements EventSubscriberInterface
{
    private string $canvaSecret;

    public function __construct(string $canvaSecret)
    {
        $this->canvaSecret = $canvaSecret;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

    /**
     * @Route("/configuration", name="_configuration", methods={"POST"})
     */
    public function configuration(): Response
    {
        return $this->json(new ErrorResponse(Error::CODE_INVALID_REQUEST));
    }

    /**
     * @Route("/resources/find", name="_resources_find", methods={"POST"})
     */
    public function resourcesFind(): Response
    {
        return $this->json(new ErrorResponse(Error::CODE_INVALID_REQUEST));
    }

    /**
     * @Route("/resources/get", name="_resources_get", methods={"POST"})
     */
    public function resourcesGet(): Response
    {
        return $this->json(new ErrorResponse(Error::CODE_INVALID_REQUEST));
    }

    /**
     * @Route("/resources/upload", name="_resources_upload")
     */
    public function resourcesUpload(Request $request, HttpClientInterface $httpClient, SerializerInterface $serializer): Response
    {
        try {
            /** @var UploadRequest $uploadRequest */
            $uploadRequest = $serializer->deserialize($request->getContent(), UploadRequest::class, 'json');

            foreach ($uploadRequest->getAssets() as $asset) {
                // do something with the result
                $httpClient->request('GET', $asset->getUrl());
            }

            return $this->json(new UploadResponse());
        } catch (InvalidArgumentException $exception) {
            return $this->json(new ErrorResponse(Error::CODE_INVALID_REQUEST));
        }
    }

    public function onKernelController(ControllerEvent $event)
    {
        $controller = $event->getController();
        $request = $event->getRequest();

        // when a controller class defines multiple action methods, the controller
        // is returned as [$controllerInstance, 'methodName']
        if (is_array($controller)) {
            $controller = $controller[0];
        }

        /**
         * Every publish extension endpoint is invoked via POST and needs
         * signature AND timestamp checking.
         */
        if ($controller instanceof self) {
            $timestampHeader = $request->headers->get(CanvaRequest::HEADER_TIMESTAMP);
            if ($timestampHeader === null || !HttpHelper::verifyTimestamp($timestampHeader, time())) {
                throw new HttpException(401, 'Timestamp skew is too large.');
            }

            $path = parse_url($request->getUri(), PHP_URL_PATH);
            $operation = '';
            switch (true) {
                case str_ends_with($path, '/configuration'):
                    $operation = '/configuration';
                    break;
                case str_ends_with($path, '/publish/resources/find'):
                    $operation = '/publish/resources/find';
                    break;
                case str_ends_with($path, '/publish/resources/get'):
                    $operation = '/publish/resources/get';
                    break;
                case str_ends_with($path, '/publish/resources/upload'):
                    $operation = '/publish/resources/upload';
                    break;
                default:
                    throw new HttpException(401, 'Unknown operation');
            }

            $signature = HttpHelper::calculatePostSignature(
                $timestampHeader,
                $operation,
                $request->getContent(),
                $this->canvaSecret
            );

            $signatureHeader = $request->headers->get(CanvaRequest::HEADER_SIGNATURES);
            if ($signatureHeader === null || !in_array($signature, explode(',', $signatureHeader), true)) {
                throw new HttpException(401, 'Signatures do not match');
            }
        }
    }
}
```

## Serialization

**Note:** This project provides model classes. De-/Serialization must be done by means of your application.

Example using the [Symfony Serializer](https://symfony.com/doc/current/components/serializer.html) component:

```php
use Canva\Publish\GetResourceRequest;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

// the json chunk extracted from the request body
$request = '...';

$encoders = [new JsonEncoder()];
$extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);
$normalizers = [new ArrayDenormalizer(), new ObjectNormalizer(null, null, null, $extractor), new PropertyNormalizer(), new GetSetMethodNormalizer()];

/** @var GetResourceRequest $getResourceRequest */
$getResourceRequest = $serializer->deserialize($request, GetResourceRequest::class, 'json');
```

## Checking incoming requests

Canva requires extensions to check incoming requests for a timestamp skew and a matching HMAC signature.
This packages provides helpers to cope with that easily.

Checking the timestamp:
```php
// allow a skew of 300 seconds
$leniency = 300;

// the timestamp at which the request was received
$localTimestamp = time();

// the timestamp at which the request was sent
$sentTimestamp = $_SERVER['HTTP_X_CANVA_TIMESTAMP'];

// returns a boolean whether the timestamps are close enough together
$timestampIsOkay = \Canva\HttpHelper::verifyTimestamp($sentTimestamp, $localTimestamp, $leniency)
```

For examples on how to check the signatures, please check the middleware section.

### Middlewares

Canva requires you to check requests coming from their end. You can do so by manually verifying the timestamp headers
with the `Canva\HttpHelper` class, or opt for a middleware **you have to mount on the paths that canva will be talking to**.

`Canva\MiddlewareTimestampMiddleware` - Checks the time skew
`Canva\Middleware\PostHMACMiddleware` - Checks the signature on POST requests
`Canva\Middleware\GetHMACMiddleware` - Checks the signature on GET requests

## Disclaimer

This project is not affiliated with Canva.com

## License

MIT
