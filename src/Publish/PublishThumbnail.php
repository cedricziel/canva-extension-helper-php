<?php

namespace Canva\Publish;

class PublishThumbnail
{
    /**
     * The URL of the thumbnail.
     *
     * @var string
     */
    private string $url;

    /**
     * The height of the thumbnail (in pixels).
     *
     * @var int|null
     */
    private ?int $height;

    /**
     * The width of the thumbnail (in pixels).
     *
     * @var int|null
     */
    private ?int $width;

    /**
     * FindThumbnail constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return PublishThumbnail
     */
    public function setUrl(string $url): PublishThumbnail
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     * @return PublishThumbnail
     */
    public function setHeight(?int $height): PublishThumbnail
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     * @return PublishThumbnail
     */
    public function setWidth(?int $width): PublishThumbnail
    {
        $this->width = $width;
        return $this;
    }
}
