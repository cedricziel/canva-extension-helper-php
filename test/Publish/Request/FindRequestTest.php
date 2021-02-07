<?php

namespace Canva\Test\Publish\Request;

use Canva\Publish\Request\FindRequest;
use Canva\Test\SerializerProvider;
use PHPUnit\Framework\TestCase;

class FindRequestTest extends TestCase
{
    use SerializerProvider;

    public function testCanDeserializeFindRequest(): void
    {
        $user = 'AUwp7hBFlaa84jGiP17Fo0y5_oe9ZhijI5w3RchtKTg=';
        $brand = 'AUwp7hDABwdaAwyEBekKbybZGICj4Ue03fXxKpJ55uU=';
        $label = 'PUBLISH';
        $limit = '100';
        $thumbnailWidth = '50';
        $thumbnailHeight = '50';
        $request = '{
          "user": "' . $user . '",
          "brand": "' . $brand . '",
          "label": "' . $label . '",
          "limit": ' . $limit . ',
          "preferredThumbnailWidth": ' . $thumbnailWidth . ',
          "preferredThumbnailHeight": ' . $thumbnailHeight . '
        }';

        /** @var FindRequest $findRequest */
        $findRequest = self::getSerializer()->deserialize($request, FindRequest::class, 'json');

        self::assertEquals($user, $findRequest->getUser());
        self::assertEquals($brand, $findRequest->getBrand());
        self::assertEquals($label, $findRequest->getLabel());
        self::assertEquals($limit, $findRequest->getLimit());
        self::assertEquals($thumbnailWidth, $findRequest->getPreferredThumbnailWidth());
        self::assertEquals($thumbnailHeight, $findRequest->getPreferredThumbnailHeight());
    }
}
