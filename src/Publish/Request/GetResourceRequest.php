<?php

declare(strict_types=1);

namespace Canva\Publish\Request;

use Canva\Request;

/**
 * POST /publish/resources/get.
 *
 * This route is only relevant to publish extensions that use the Flat list or Nested list layout.
 *
 * If a user selects a container before publishing their design, Canva sends a POST request to the following URL:
 * <endpoint_url>/publish/resources/get
 *
 * This request is sent before the upload request.
 * This route is expected to verify that the container still exists on the destination platform.
 * If authentication is enabled, this route should also verify that the user still has the correct permissions
 * to publish their design to the container.
 *
 * Canva won't send a request to this route if the user doesn't select a container.
 *
 * @see https://www.canva.com/developers/docs/publish-extensions/api/post-publish-resources-get/
 */
class GetResourceRequest implements Request
{
    /**
     * The ID of the user's brand.
     */
    private string $brand;

    /**
     * The ID of the selected container.
     */
    private string $id;

    /**
     * The type of extension that triggered the request.
     */
    private string $label;

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

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): GetResourceRequest
    {
        $this->brand = $brand;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): GetResourceRequest
    {
        $this->id = $id;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): GetResourceRequest
    {
        $this->label = $label;

        return $this;
    }

    public function getPreferredThumbnailHeight(): int
    {
        return $this->preferredThumbnailHeight;
    }

    public function setPreferredThumbnailHeight(int $preferredThumbnailHeight): GetResourceRequest
    {
        $this->preferredThumbnailHeight = $preferredThumbnailHeight;

        return $this;
    }

    public function getPreferredThumbnailWidth(): int
    {
        return $this->preferredThumbnailWidth;
    }

    /**
     * @param string $preferredThumbnailWidth
     */
    public function setPreferredThumbnailWidth(int $preferredThumbnailWidth): GetResourceRequest
    {
        $this->preferredThumbnailWidth = $preferredThumbnailWidth;

        return $this;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): GetResourceRequest
    {
        $this->user = $user;

        return $this;
    }
}
