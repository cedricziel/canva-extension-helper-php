<?php
declare(strict_types=1);

namespace Canva\Content\Response;

use Canva\Content\ContentContainer;
use Canva\Response;

class ContainerResponse implements Response
{
    /**
     * The type of response.
     *
     * @var string
     */
    private string $type;

    /**
     * The containers to render in the side panel.
     *
     * @var array|ContentContainer[]
     */
    private array $resources;

    /**
     * A token for paginating resources.
     *
     * @var string|null
     */
    private ?string $continuation;

    public function __construct(array $resources = [])
    {
        $this->type = Response::SUCCESS;
        $this->resources = $resources;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array|ContentContainer[]
     */
    public function getResources(): array
    {
        return $this->resources;
    }

    /**
     * @param array|ContentContainer[] $resources
     * @return ContainerResponse
     */
    public function setResources(array $resources = []): ContainerResponse
    {
        $this->resources = $resources;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContinuation(): ?string
    {
        return $this->continuation;
    }

    /**
     * @param string|null $continuation
     * @return ContainerResponse
     */
    public function setContinuation(?string $continuation): ContainerResponse
    {
        $this->continuation = $continuation;
        return $this;
    }
}
