<?php

namespace Canva\Publish\Response;

use Canva\Publish\PublishResource;
use Canva\Response;

class FindResponse implements Response
{
    /**
     * The resources to display in the Publish menu.
     *
     * @var array|PublishResource[]
     */
    private array $resources;

    /**
     * The type of response.
     *
     * @var string
     */
    private string $type;

    /**
     * A token used for pagination.
     *
     * @var string
     */
    private string $continuation;

    /**
     * FindResponse constructor.
     */
    public function __construct()
    {
        $this->resources = [];
    }

    /**
     * @return array|PublishResource[]
     */
    public function getResources(): array
    {
        return $this->resources;
    }

    /**
     * @param array|PublishResource[] $resources
     * @return FindResponse
     */
    public function setResources(array $resources): FindResponse
    {
        $this->resources = $resources;
        return $this;
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
     * @return FindResponse
     */
    public function setType(string $type): FindResponse
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getContinuation(): string
    {
        return $this->continuation;
    }

    /**
     * @param string $continuation
     * @return FindResponse
     */
    public function setContinuation(string $continuation): FindResponse
    {
        $this->continuation = $continuation;
        return $this;
    }
}
