<?php

namespace Canva\Publish;

/**
 * When a user publishes their design, Canva sends a POST request to the following URL:
 *
 * <endpoint_url>/publish/resources/upload
 *
 * This route is expected to upload the user's design to the publishing destination and provide a response
 * that indicates if the upload succeeded or failed.
 *
 * @see https://www.canva.com/developers/docs/publish-extensions/api/post-publish-resources-upload/
 */
class UploadRequest
{
    /**
     * The assets to upload to the destination platform.
     *
     * @var UploadAsset[]
     */
    private array $assets;

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
     * The ID of the user.
     *
     * @var string
     */
    private string $user;

    /**
     * A message, provided by the user.
     *
     * @var string|null
     */
    private ?string $message;

    /**
     * The ID of a container the user selected before publishing their design,
     * or null if the user didn't select a container.
     *
     * @var string|null
     */
    private ?string $parent;

    /**
     * The ID of the user's design. This ID is obfuscated and does not change if the user republishes their design.
     *
     * @var string
     */
    private string $designId;

    public function __construct()
    {
        $this->assets = [];
        $this->message = null;
        $this->parent = null;
    }

    /**
     * @return array|UploadAsset[]
     */
    public function getAssets(): array
    {
        return $this->assets;
    }

    /**
     * @param UploadAsset[] $assets
     * @return UploadRequest
     */
    public function setAssets(array $assets): UploadRequest
    {
        $this->assets = $assets;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return UploadRequest
     */
    public function setBrand(string $brand): UploadRequest
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
     * @return UploadRequest
     */
    public function setLabel(string $label): UploadRequest
    {
        $this->label = $label;
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
     * @return UploadRequest
     */
    public function setUser(string $user): UploadRequest
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return UploadRequest
     */
    public function setMessage(?string $message): UploadRequest
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getParent(): ?string
    {
        return $this->parent;
    }

    /**
     * @param string|null $parent
     * @return UploadRequest
     */
    public function setParent(?string $parent): UploadRequest
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDesignId(): ?string
    {
        return $this->designId;
    }

    /**
     * @param string|null $designId
     */
    public function setDesignId(?string $designId): UploadRequest
    {
        $this->designId = $designId;
        return $this;
    }
}
