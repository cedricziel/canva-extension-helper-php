# Canva.com extensions with  PHP

Some utilities for building canva extensions.

**Note:** This project provides model classes. De-/Serialization must be done by means of your application.

Example using the [Symfony Serializer](https://symfony.com/doc/current/components/serializer.html) component:

```php
use Canva\Publish\GetResourceRequest;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

// the json chunk extracted from the request body
$request = '...';

$encoders = [new JsonEncoder()];
$normalizers = [new ObjectNormalizer()];

$serializer = Serializer($normalizers, $encoders);

/** @var GetResourceRequest $getResourceRequest */
$getResourceRequest = $serializer->deserialize($request, GetResourceRequest::class, 'json');
```

## Disclaimer

This project is not affiliated with Canva.com

## License

MIT
