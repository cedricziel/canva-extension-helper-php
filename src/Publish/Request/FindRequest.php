<?php

namespace Canva\Publish\Request;

use Canva\Request;

/**
 * POST /publish/resources/find
 *
 * This route is only relevant to publish extensions that use the Flat list or Nested list layout.
 *
 * When a user opens a publish extension, Canva sends a POST request to the following URL:
 *
 * <endpoint_url>/publish/resources/find
 *
 * This route is expected to return a list of resources. These resources can have a type of "IMAGE" or "CONTAINER".
 *
 * When a resource is a "CONTAINER", it's rendered as a folder that the user can select before publishing their design.
 * When a resource is an "IMAGE", it's rendered as a non-interactive file.
 *
 * @see https://www.canva.com/developers/docs/publish-extensions/api/post-publish-resources-find/
 */
class FindRequest implements Request
{
    /**
     * The ID of the user's brand.
     *
     * @var string
     */
    private string $brand;

    /**
     * The type of extension that triggered the request.
     *
     * @var string
     */
    private string $label;

    /**
     * The maximum number of resources to return in a response.
     *
     * @var int
     */
    private int $limit;

    /**
     * The recommend height (in pixels) for any thumbnails returned in the response.
     *
     * @var int
     */
    private int $preferredThumbnailHeight;

    /**
     * The recommend width (in pixels) for any thumbnails returned in the response.
     *
     * @var int
     */
    private int $preferredThumbnailWidth;

    /**
     * The ID of the user.
     *
     * @var string
     */
    private string $user;

    /**
     * The ID of the opened container, or null if the user hasn't opened a container.
     *
     * @var string|null
     */
    private ?string $containerId;

    /**
     * A token used for pagination.
     *
     * @see https://www.canva.com/developers/docs/publish-extensions/pagination/
     * @var string|null
     */
    private ?string $continuation;

    /**
     * A search query, provided by the user.
     *
     * @var string|null
     */
    private ?string $query;

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return FindRequest
     */
    public function setBrand(string $brand): FindRequest
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return FindRequest
     */
    public function setLabel(string $label): FindRequest
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return FindRequest
     */
    public function setLimit(int $limit): FindRequest
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getPreferredThumbnailHeight(): int
    {
        return $this->preferredThumbnailHeight;
    }

    /**
     * @param int $preferredThumbnailHeight
     * @return FindRequest
     */
    public function setPreferredThumbnailHeight(int $preferredThumbnailHeight): FindRequest
    {
        $this->preferredThumbnailHeight = $preferredThumbnailHeight;
        return $this;
    }

    /**
     * @return int
     */
    public function getPreferredThumbnailWidth(): int
    {
        return $this->preferredThumbnailWidth;
    }

    /**
     * @param int $preferredThumbnailWidth
     * @return FindRequest
     */
    public function setPreferredThumbnailWidth(int $preferredThumbnailWidth): FindRequest
    {
        $this->preferredThumbnailWidth = $preferredThumbnailWidth;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return FindRequest
     */
    public function setUser(string $user): FindRequest
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContainerId(): ?string
    {
        return $this->containerId;
    }

    /**
     * @param string|null $containerId
     * @return FindRequest
     */
    public function setContainerId(?string $containerId): FindRequest
    {
        $this->containerId = $containerId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContinuation(): ?string
    {
        return $this->continuation;
    }

    /**
     * @param string|null $continuation
     * @return FindRequest
     */
    public function setContinuation(?string $continuation): FindRequest
    {
        $this->continuation = $continuation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @param string|null $query
     * @return FindRequest
     */
    public function setQuery(?string $query): FindRequest
    {
        $this->query = $query;
        return $this;
    }
}
