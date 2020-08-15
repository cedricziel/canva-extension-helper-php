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
     *
     * @var string
     */
    private string $id;

    /**
     * If true, the user is considered to be the owner of the resource.
     *
     * @var bool
     */
    private bool $isOwner;

    /**
     * A human readable name for the resource.
     *
     * @var string
     */
    private string $name;

    /**
     * If true, the resource is considered to be read-only.
     *
     * @var bool
     */
    private bool $readOnly;

    /**
     * The type of resource.
     *
     * @var string
     */
    private string $type;

    /**
     * A thumbnail image.
     *
     * @var PublishThumbnail|null
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

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return PublishResource
     */
    public function setId(string $id): PublishResource
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->isOwner;
    }

    /**
     * @param bool $isOwner
     * @return PublishResource
     */
    public function setIsOwner(bool $isOwner): PublishResource
    {
        $this->isOwner = $isOwner;
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
     * @return PublishResource
     */
    public function setName(string $name): PublishResource
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReadOnly(): bool
    {
        return $this->readOnly;
    }

    /**
     * @param bool $readOnly
     * @return PublishResource
     */
    public function setReadOnly(bool $readOnly): PublishResource
    {
        $this->readOnly = $readOnly;
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
     * @return PublishResource
     */
    public function setType(string $type): PublishResource
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return PublishThumbnail|null
     */
    public function getThumbnail(): ?PublishThumbnail
    {
        return $this->thumbnail;
    }

    /**
     * @param PublishThumbnail|null $thumbnail
     * @return PublishResource
     */
    public function setThumbnail(?PublishThumbnail $thumbnail): PublishResource
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }
}
