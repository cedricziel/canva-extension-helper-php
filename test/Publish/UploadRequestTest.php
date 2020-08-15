<?php

namespace Canva\Test\Publish;

use Canva\Publish\UploadRequest;
use Canva\Test\SerializerProvider;
use PHPUnit\Framework\TestCase;

class UploadRequestTest extends TestCase
{
    use SerializerProvider;

    public function testCanDeserializeRequest(): void
    {
        $user = 'AUQ2RUzug9pEvgpK9lL2qlpRsIbn1Vy5GoEt1MaKRE=';
        $brand = 'AUQ2RUxiRj966Wsvp7oGrz33BnaFmtq4ftBeLCSHf8=';
        $label = 'PUBLISH';
        $assetUrl = 'https://s3.amazonaws.com/.../49-04fa92cbfbf8.jpg';
        $assetType = 'JPG';
        $assetName = '0001-144954.jpg';

        $request = '{
          "user": "' . $user . '",
          "brand": "' . $brand . '",
          "label": "' . $label . '",
          "assets": [
            {
              "url": "' . $assetUrl . '",
              "type": "' . $assetType . '",
              "name": "' . $assetName . '"
            }
          ]
        }';

        /** @var UploadRequest $uploadRequest */
        $uploadRequest = self::getSerializer()->deserialize($request, UploadRequest::class, 'json');

        self::assertEquals($user, $uploadRequest->getUser());
        self::assertEquals($brand, $uploadRequest->getBrand());
        self::assertEquals($label, $uploadRequest->getLabel());

        self::assertCount(1, $uploadRequest->getAssets());

        self::assertEquals($assetName, $uploadRequest->getAssets()[0]->getName());
        self::assertEquals($assetType, $uploadRequest->getAssets()[0]->getType());
        self::assertEquals($assetUrl, $uploadRequest->getAssets()[0]->getUrl());
    }
}
