<?php

declare(strict_types=1);

namespace Canva\Test\Content\Request;

use Canva\Content\Request\FindRequest;
use Canva\Test\SerializerProvider;
use PHPUnit\Framework\TestCase;

class FindRequestTest extends TestCase
{
    use SerializerProvider;

    public function testCanDeserializeFindRequest(): void
    {
        $user = 'AUwp7hBFlaa84jGiP17Fo0y5_oe9ZhijI5w3RchtKTg=';
        $brand = 'AUwp7hDABwdaAwyEBekKbybZGICj4Ue03fXxKpJ55uU=';
        $label = 'CONTENT';
        $limit = '100';
        $locale = 'de';
        $request = '{
          "user": "'.$user.'",
          "brand": "'.$brand.'",
          "label": "'.$label.'",
          "limit": '.$limit.',
          "locale": "'.$locale.'"
        }';

        /** @var FindRequest $findRequest */
        $findRequest = self::getSerializer()->deserialize($request, FindRequest::class, 'json');

        self::assertEquals($user, $findRequest->getUser());
        self::assertEquals($brand, $findRequest->getBrand());
        self::assertEquals($label, $findRequest->getLabel());
        self::assertEquals($limit, $findRequest->getLimit());
        self::assertEquals($locale, $findRequest->getLocale());
    }
}
