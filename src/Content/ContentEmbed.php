<?php

declare(strict_types=1);

namespace Canva\Content;

class ContentEmbed implements Content
{
    /**
     * A unique ID for the embed.
     */
    private string $id;

    /**
     * A human readable name for the embed.
     */
    private string $name;

    /**
     * The type of resource.
     */
    private string $type = 'EMBED';

    /**
     * A thumbnail for the embed.
     */
    private ContentThumbnail $thumbnail;

    /**
     * The URL of the embeddable media. This URL must be supported by Iframely.
     *
     * @see https://iframely.com/docs/providers
     */
    private string $url;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ContentEmbed
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ContentEmbed
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): ContentEmbed
    {
        $this->type = $type;

        return $this;
    }

    public function getThumbnail(): ContentThumbnail
    {
        return $this->thumbnail;
    }

    public function setThumbnail(ContentThumbnail $thumbnail): ContentEmbed
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): ContentEmbed
    {
        $this->url = $url;

        return $this;
    }
}
