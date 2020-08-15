# Canva.com extensions with  PHP

Some utilities for building canva extensions.

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

## Disclaimer

This project is not affiliated with Canva.com

## License

MIT
