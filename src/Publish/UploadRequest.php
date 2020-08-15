<?php

namespace Canva\Publish;

use ReflectionClass;
use ReflectionProperty;

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
     * @var Asset[]
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

    public function __construct()
    {
        $this->assets = [];
    }

    public static function fromJSON(string $input): UploadRequest
    {
        $instance = new static();

        $jsonObject = json_decode($input, false, 512, JSON_THROW_ON_ERROR);

        $reflectionClass = new ReflectionClass($input);
        foreach ($reflectionClass->getProperties() as $prop) {
            $propName = $prop->name;

            if ($propName === 'assets') {
                $assets = [];
                if (is_array($jsonObject->$propName)) {

                }
            }
            if (isset($jsonObject->$propName)) {
                $prop->setValue($instance, $jsonObject->$propName);
            } else {
                $prop->setValue($instance, null);
            }
        }

        return $instance;
    }

    /**
     * @return Asset[]
     */
    public function getAssets(): array
    {
        return $this->assets;
    }

    /**
     * @param Asset[] $assets
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
}
