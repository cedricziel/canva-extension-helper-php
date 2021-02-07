<?php
declare(strict_types=1);

namespace Canva\Content;

class ContentContainer implements Content
{
    /**
     * A unique ID for the container.
     *
     * @var string
     */
    private string $id;

    /**
     * A human readable name for the container.
     *
     * @var string
     */
    private string $name;

    /**
     * The type of resource.
     *
     * @var string
     */
    private string $type = 'CONTAINER';

    /**
     * A thumbnail for the container.
     *
     * @var ?ContentThumbnail
     */
    private ?ContentThumbnail $thumbnail;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ContentContainer
     */
    public function setId(string $id): ContentContainer
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
     * @return ContentContainer
     */
    public function setName(string $name): ContentContainer
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
     * @return ContentContainer
     */
    public function setType(string $type): ContentContainer
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return ContentThumbnail|null
     */
    public function getThumbnail(): ?ContentThumbnail
    {
        return $this->thumbnail;
    }

    /**
     * @param ContentThumbnail|null $thumbnail
     * @return ContentContainer
     */
    public function setThumbnail(?ContentThumbnail $thumbnail): ContentContainer
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }
}
