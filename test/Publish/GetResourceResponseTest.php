<?php

namespace Canva\Test\Publish;

use Canva\Publish\GetResourceResponse;
use Canva\Publish\PublishResource;
use Canva\Response;
use Canva\Test\SerializerProvider;
use PHPUnit\Framework\TestCase;

class GetResourceResponseTest extends TestCase
{
    use SerializerProvider;

    public function testCanSerializeGetResourceResponse()
    {
        $expected = '{
          "type": "SUCCESS",
          "resource": {
            "type": "CONTAINER",
            "id": "123456",
            "name": "Example Container",
            "readOnly": false,
            "isOwner": true
          }
        }';

        $resource = new PublishResource(PublishResource::TYPE_CONTAINER, '123456','Example Container');
        $instance = new GetResourceResponse(Response::SUCCESS, $resource);

        $json = self::getSerializer()->serialize($instance, 'json');

        $obj = json_decode($json, false, 512, JSON_THROW_ON_ERROR);
        self::assertEquals($instance->getType(), $obj->type);
        self::assertEquals($instance->getResource()->getType(), $obj->resource->type);
    }
}
