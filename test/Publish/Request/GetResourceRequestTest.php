<?php

declare(strict_types=1);

namespace Canva\Test\Publish\Request;

use Canva\Publish\Request\GetResourceRequest;
use Canva\Test\SerializerProvider;
use PHPUnit\Framework\TestCase;

class GetResourceRequestTest extends TestCase
{
    use SerializerProvider;

    public function testCanDeserializeRequest(): void
    {
        $user = 'AUQ2RUzug9pEvgpK9lL2qlpRsIbn1Vy5GoEt1MaKRE=';
        $brand = 'AUQ2RUxiRj966Wsvp7oGrz33BnaFmtq4ftBeLCSHf8=';
        $label = 'PUBLISH';
        $id = 'exampleContainer';
        $preferredThumbnailWidth = '50';
        $preferredThumbnailHeight = '50';

        $request = '{
          "user": "'.$user.'",
          "brand": "'.$brand.'",
          "label": "'.$label.'",
          "id": "'.$id.'",
          "preferredThumbnailWidth": '.$preferredThumbnailWidth.',
          "preferredThumbnailHeight": '.$preferredThumbnailHeight.'
        }';

        $serializer = self::getSerializer();
        /** @var GetResourceRequest $getResourceRequest */
        $getResourceRequest = $serializer->deserialize($request, GetResourceRequest::class, 'json');

        self::assertEquals($user, $getResourceRequest->getUser());
        self::assertEquals($brand, $getResourceRequest->getBrand());
        self::assertEquals($label, $getResourceRequest->getLabel());
        self::assertEquals($id, $getResourceRequest->getId());
        self::assertEquals($preferredThumbnailHeight, $getResourceRequest->getPreferredThumbnailHeight());
        self::assertEquals($preferredThumbnailWidth, $getResourceRequest->getPreferredThumbnailWidth());
    }
}
