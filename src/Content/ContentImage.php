<?php

declare(strict_types=1);

namespace Canva\Content;

class ContentImage implements Content
{
    public const CONTENT_TYPE_JPEG = 'image/jpeg';
    public const CONTENT_TYPE_PNG = 'image/png';
    public const CONTENT_TYPE_SVG = 'image/svg+xml';

    /**
     * The MIME type of the image. If you omit the contentType, Canva must send a HEAD request
     * to each image, which decreases the performance of the extension.
     *
     * Enum: "image/jpeg", "image/png", "image/svg+xml"
     */
    private ?string $contentType;

    /**
     * A unique ID for the image. This ID should always refer to the same image file.
     */
    private string $id;

    /**
     * A human readable name for the image.
     */
    private string $name;

    /**
     * The type of resource.
     */
    private string $type = 'IMAGE';

    /**
     * The URL of the full-resolution image.
     * The MIME type of the image must match the type specified in the contentType property.
     * The image must also meet Canva's Upload format and requirements.
     * For security reasons, the URL must not redirect to a different URL.
     */
    private string $url;

    /**
     * A thumbnail for the image.
     * This thumbnail must have the same aspect ratio as the full-resolution image.
     */
    private ContentThumbnail $thumbnail;

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function setContentType(?string $contentType): ContentImage
    {
        $this->contentType = $contentType;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ContentImage
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ContentImage
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): ContentImage
    {
        $this->type = $type;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): ContentImage
    {
        $this->url = $url;

        return $this;
    }

    public function getThumbnail(): ContentThumbnail
    {
        return $this->thumbnail;
    }

    public function setThumbnail(ContentThumbnail $thumbnail): ContentImage
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
