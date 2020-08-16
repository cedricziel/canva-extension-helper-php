# Canva.com extensions with  PHP

Some utilities for building canva extensions.

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
