<?php


namespace Canva\Publish;

/**
 * POST /publish/resources/get
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
class GetResourceRequest
{
    /**
     * The ID of the user's brand.
     *
     * @var string
     */
    private string $brand;

    /**
     * The ID of the selected container.
     *
     * @var string
     */
    private string $id;

    /**
     * The type of extension that triggered the request.
     *
     * @var string
     */
    private string $label;

    /**
     * The recommend height (in pixels) for any thumbnails returned in the response.
     *
     * @var string
     */
    private string $preferredThumbnailHeight;

    /**
     * The recommend width (in pixels) for any thumbnails returned in the response.
     *
     * @var string
     */
    private string $preferredThumbnailWidth;

    /**
     * The ID of the user.
     *
     * @var string
     */
    private string $user;

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return GetResourceRequest
     */
    public function setBrand(string $brand): GetResourceRequest
    {
        $this->brand = $brand;
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
     * @return GetResourceRequest
     */
    public function setId(string $id): GetResourceRequest
    {
        $this->id = $id;
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
     * @return GetResourceRequest
     */
    public function setLabel(string $label): GetResourceRequest
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getPreferredThumbnailHeight(): string
    {
        return $this->preferredThumbnailHeight;
    }

    /**
     * @param string $preferredThumbnailHeight
     * @return GetResourceRequest
     */
    public function setPreferredThumbnailHeight(string $preferredThumbnailHeight): GetResourceRequest
    {
        $this->preferredThumbnailHeight = $preferredThumbnailHeight;
        return $this;
    }

    /**
     * @return string
     */
    public function getPreferredThumbnailWidth(): string
    {
        return $this->preferredThumbnailWidth;
    }

    /**
     * @param string $preferredThumbnailWidth
     * @return GetResourceRequest
     */
    public function setPreferredThumbnailWidth(string $preferredThumbnailWidth): GetResourceRequest
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
     * @return GetResourceRequest
     */
    public function setUser(string $user): GetResourceRequest
    {
        $this->user = $user;
        return $this;
    }
}
