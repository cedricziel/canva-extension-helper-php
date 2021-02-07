<?php

declare(strict_types=1);

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
     */
    private string $type;

    /**
     * A token used for pagination.
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
     */
    public function setResources(array $resources): FindResponse
    {
        $this->resources = $resources;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): FindResponse
    {
        $this->type = $type;

        return $this;
    }

    public function getContinuation(): string
    {
        return $this->continuation;
    }

    public function setContinuation(string $continuation): FindResponse
    {
        $this->continuation = $continuation;

        return $this;
    }
}
