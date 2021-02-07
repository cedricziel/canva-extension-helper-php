<?php
declare(strict_types=1);

namespace Canva\Content;

class ContentThumbnail
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
     * @return ContentThumbnail
     */
    public function setUrl(string $url): ContentThumbnail
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
     * @return ContentThumbnail
     */
    public function setHeight(?int $height): ContentThumbnail
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
     * @return ContentThumbnail
     */
    public function setWidth(?int $width): ContentThumbnail
    {
        $this->width = $width;
        return $this;
    }
}
