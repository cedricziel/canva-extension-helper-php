<?php

namespace Canva\Publish\Response;

use Canva\Publish\PublishResource;
use Canva\Response;

class GetResourceResponse implements Response
{
    /**
     * The type of response.
     *
     * @var string
     */
    private string $type;

    /**
     * A container resource.
     *
     * @var ?PublishResource
     */
    private ?PublishResource $resource;

    public function __construct(string $type, ?PublishResource $resource)
    {
        $this->type = $type;
        $this->resource = $resource;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return GetResourceResponse
     */
    public function setType(string $type): GetResourceResponse
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return ?PublishResource
     */
    public function getResource(): ?PublishResource
    {
        return $this->resource;
    }

    /**
     * @param ?PublishResource $resource
     * @return GetResourceResponse
     */
    public function setResource(?PublishResource $resource): GetResourceResponse
    {
        $this->resource = $resource;
        return $this;
    }
}
