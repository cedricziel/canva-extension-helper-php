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
     *
     * @var string|null
     */
    private ?string $contentType;

    /**
     * A unique ID for the image. This ID should always refer to the same image file.
     *
     * @var string
     */
    private string $id;

    /**
     * A human readable name for the image.
     *
     * @var string
     */
    private string $name;

    /**
     * The type of resource.
     *
     * @var string
     */
    private string $type = 'IMAGE';

    /**
     * The URL of the full-resolution image.
     * The MIME type of the image must match the type specified in the contentType property.
     * The image must also meet Canva's Upload format and requirements.
     * For security reasons, the URL must not redirect to a different URL.
     *
     * @var string
     */
    private string $url;

    /**
     * A thumbnail for the image.
     * This thumbnail must have the same aspect ratio as the full-resolution image.
     *
     * @var ContentThumbnail
     */
    private ContentThumbnail $thumbnail;

    /**
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * @param string|null $contentType
     * @return ContentImage
     */
    public function setContentType(?string $contentType): ContentImage
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ContentImage
     */
    public function setId(string $id): ContentImage
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ContentImage
     */
    public function setName(string $name): ContentImage
    {
        $this->name = $name;
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
     * @return ContentImage
     */
    public function setType(string $type): ContentImage
    {
        $this->type = $type;
        return $this;
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
     * @return ContentImage
     */
    public function setUrl(string $url): ContentImage
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return ContentThumbnail
     */
    public function getThumbnail(): ContentThumbnail
    {
        return $this->thumbnail;
    }

    /**
     * @param ContentThumbnail $thumbnail
     * @return ContentImage
     */
    public function setThumbnail(ContentThumbnail $thumbnail): ContentImage
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }
}
