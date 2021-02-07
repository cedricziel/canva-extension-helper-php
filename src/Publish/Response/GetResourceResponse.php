<?php

namespace Canva\Publish\Response;

use Canva\Publish\PublishResource;
use Canva\Response;

class GetResourceResponse implements Response
{
    /**
     * The type of response.
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

    public function getType(): string
    {
        return $this->type;
    }

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
     */
    public function setResource(?PublishResource $resource): GetResourceResponse
    {
        $this->resource = $resource;

        return $this;
    }
}
