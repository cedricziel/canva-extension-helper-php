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
     *
     * @var string
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
     * @param array|ContentImage[] $resources
     * @return ImageResponse
     */
    public function setResources(array $resources = []): ImageResponse
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
     * @return ImageResponse
     */
    public function setContinuation(?string $continuation): ImageResponse
    {
        $this->continuation = $continuation;
        return $this;
    }
}
