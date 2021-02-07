<?php
declare(strict_types=1);

namespace Canva\Content;

class ContentEmbed implements Content
{
    /**
     * A unique ID for the embed.
     *
     * @var string
     */
    private string $id;

    /**
     * A human readable name for the embed.
     *
     * @var string
     */
    private string $name;

    /**
     * The type of resource.
     *
     * @var string
     */
    private string $type = 'EMBED';

    /**
     * A thumbnail for the embed.
     *
     * @var ContentThumbnail
     */
    private ContentThumbnail $thumbnail;

    /**
     * The URL of the embeddable media. This URL must be supported by Iframely.
     *
     * @see https://iframely.com/docs/providers
     *
     * @var string
     */
    private string $url;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ContentEmbed
     */
    public function setId(string $id): ContentEmbed
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
     * @return ContentEmbed
     */
    public function setName(string $name): ContentEmbed
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
     * @return ContentEmbed
     */
    public function setType(string $type): ContentEmbed
    {
        $this->type = $type;
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
     * @return ContentEmbed
     */
    public function setThumbnail(ContentThumbnail $thumbnail): ContentEmbed
    {
        $this->thumbnail = $thumbnail;
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
     * @return ContentEmbed
     */
    public function setUrl(string $url): ContentEmbed
    {
        $this->url = $url;
        return $this;
    }
}
