<?php

namespace Canva\Publish;

/**
 * @see https://www.canva.com/developers/docs/publish-extensions/api/post-publish-resources-get/
 */
class PublishResource
{
    public const TYPE_CONTAINER = 'CONTAINER';

    /**
     * A unique ID for the resource.
     */
    private string $id;

    /**
     * If true, the user is considered to be the owner of the resource.
     */
    private bool $isOwner;

    /**
     * A human readable name for the resource.
     */
    private string $name;

    /**
     * If true, the resource is considered to be read-only.
     */
    private bool $readOnly;

    /**
     * The type of resource.
     */
    private string $type;

    /**
     * A thumbnail image.
     */
    private ?PublishThumbnail $thumbnail;

    public function __construct(string $type, string $id, string $name, bool $isOwner = true, bool $readOnly = false, PublishThumbnail $thumbnail = null)
    {
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->isOwner = $isOwner;
        $this->readOnly = $readOnly;
        $this->thumbnail = $thumbnail;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): PublishResource
    {
        $this->id = $id;

        return $this;
    }

    public function isOwner(): bool
    {
        return $this->isOwner;
    }

    public function setIsOwner(bool $isOwner): PublishResource
    {
        $this->isOwner = $isOwner;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): PublishResource
    {
        $this->name = $name;

        return $this;
    }

    public function isReadOnly(): bool
    {
        return $this->readOnly;
    }

    public function setReadOnly(bool $readOnly): PublishResource
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): PublishResource
    {
        $this->type = $type;

        return $this;
    }

    public function getThumbnail(): ?PublishThumbnail
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?PublishThumbnail $thumbnail): PublishResource
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
