<?php

declare(strict_types=1);

namespace Canva\Content;

class ContentContainer implements Content
{
    /**
     * A unique ID for the container.
     */
    private string $id;

    /**
     * A human readable name for the container.
     */
    private string $name;

    /**
     * The type of resource.
     */
    private string $type = 'CONTAINER';

    /**
     * A thumbnail for the container.
     *
     * @var ?ContentThumbnail
     */
    private ?ContentThumbnail $thumbnail;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ContentContainer
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ContentContainer
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): ContentContainer
    {
        $this->type = $type;

        return $this;
    }

    public function getThumbnail(): ?ContentThumbnail
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?ContentThumbnail $thumbnail): ContentContainer
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
