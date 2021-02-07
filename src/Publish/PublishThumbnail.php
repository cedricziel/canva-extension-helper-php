<?php

namespace Canva\Publish;

class PublishThumbnail
{
    /**
     * The URL of the thumbnail.
     */
    private string $url;

    /**
     * The height of the thumbnail (in pixels).
     */
    private ?int $height;

    /**
     * The width of the thumbnail (in pixels).
     */
    private ?int $width;

    /**
     * FindThumbnail constructor.
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): PublishThumbnail
    {
        $this->url = $url;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): PublishThumbnail
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): PublishThumbnail
    {
        $this->width = $width;

        return $this;
    }
}
