<?php

declare(strict_types=1);

namespace Canva\Publish\Request;

use Canva\Publish\UploadAsset;
use Canva\Request;

/**
 * When a user publishes their design, Canva sends a POST request to the following URL:.
 *
 * <endpoint_url>/publish/resources/upload
 *
 * This route is expected to upload the user's design to the publishing destination and provide a response
 * that indicates if the upload succeeded or failed.
 *
 * @see https://www.canva.com/developers/docs/publish-extensions/api/post-publish-resources-upload/
 */
class UploadRequest implements Request
{
    /**
     * The assets to upload to the destination platform.
     *
     * @var UploadAsset[]
     */
    private array $assets;

    /**
     * The ID of the user's brand.
     */
    private string $brand;

    /**
     * The type of extension that triggered the request.
     */
    private string $label;

    /**
     * The ID of the user.
     */
    private string $user;

    /**
     * A message, provided by the user.
     */
    private ?string $message;

    /**
     * The ID of a container the user selected before publishing their design,
     * or null if the user didn't select a container.
     */
    private ?string $parent;

    /**
     * The ID of the user's design. This ID is obfuscated and does not change if the user republishes their design.
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
     */
    public function setAssets(array $assets): UploadRequest
    {
        $this->assets = $assets;

        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): UploadRequest
    {
        $this->brand = $brand;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): UploadRequest
    {
        $this->label = $label;

        return $this;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): UploadRequest
    {
        $this->user = $user;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): UploadRequest
    {
        $this->message = $message;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): UploadRequest
    {
        $this->parent = $parent;

        return $this;
    }

    public function getDesignId(): ?string
    {
        return $this->designId;
    }

    public function setDesignId(?string $designId): UploadRequest
    {
        $this->designId = $designId;

        return $this;
    }
}
