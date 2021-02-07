<?php

declare(strict_types=1);

namespace Canva\Content\Response;

use Canva\Content\ContentContainer;
use Canva\Content\ContentImage;
use Canva\Response;

class ImageResponse implements Response
{
    /**
     * The type of response.
     */
    private string $type;

    /**
     * The images to render in the side panel.
     *
     * @var array|ContentImage[]
     */
    private array $resources;

    /**
     * A token for paginating resources.
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
     * @param array|ContentImage[] $resources
     */
    public function setResources(array $resources = []): ImageResponse
    {
        $this->resources = $resources;

        return $this;
    }

    public function getContinuation(): ?string
    {
        return $this->continuation;
    }

    public function setContinuation(?string $continuation): ImageResponse
    {
        $this->continuation = $continuation;

        return $this;
    }
}
