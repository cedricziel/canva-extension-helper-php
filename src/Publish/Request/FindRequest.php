<?php

declare(strict_types=1);

namespace Canva\Publish\Request;

use Canva\Request;

/**
 * POST /publish/resources/find.
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
     */
    private string $brand;

    /**
     * The type of extension that triggered the request.
     */
    private string $label;

    /**
     * The maximum number of resources to return in a response.
     */
    private int $limit;

    /**
     * The recommend height (in pixels) for any thumbnails returned in the response.
     */
    private int $preferredThumbnailHeight;

    /**
     * The recommend width (in pixels) for any thumbnails returned in the response.
     */
    private int $preferredThumbnailWidth;

    /**
     * The ID of the user.
     */
    private string $user;

    /**
     * The ID of the opened container, or null if the user hasn't opened a container.
     */
    private ?string $containerId;

    /**
     * A token used for pagination.
     *
     * @see https://www.canva.com/developers/docs/publish-extensions/pagination/
     */
    private ?string $continuation;

    /**
     * A search query, provided by the user.
     */
    private ?string $query;

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): FindRequest
    {
        $this->brand = $brand;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): FindRequest
    {
        $this->label = $label;

        return $this;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): FindRequest
    {
        $this->limit = $limit;

        return $this;
    }

    public function getPreferredThumbnailHeight(): int
    {
        return $this->preferredThumbnailHeight;
    }

    public function setPreferredThumbnailHeight(int $preferredThumbnailHeight): FindRequest
    {
        $this->preferredThumbnailHeight = $preferredThumbnailHeight;

        return $this;
    }

    public function getPreferredThumbnailWidth(): int
    {
        return $this->preferredThumbnailWidth;
    }

    public function setPreferredThumbnailWidth(int $preferredThumbnailWidth): FindRequest
    {
        $this->preferredThumbnailWidth = $preferredThumbnailWidth;

        return $this;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): FindRequest
    {
        $this->user = $user;

        return $this;
    }

    public function getContainerId(): ?string
    {
        return $this->containerId;
    }

    public function setContainerId(?string $containerId): FindRequest
    {
        $this->containerId = $containerId;

        return $this;
    }

    public function getContinuation(): ?string
    {
        return $this->continuation;
    }

    public function setContinuation(?string $continuation): FindRequest
    {
        $this->continuation = $continuation;

        return $this;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function setQuery(?string $query): FindRequest
    {
        $this->query = $query;

        return $this;
    }
}
