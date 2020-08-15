<?php

namespace Canva\Publish;

/**
 * @see https://www.canva.com/developers/docs/publish-extensions/api/post-publish-resources-upload/
 */
class UploadAsset
{
    public const ASSET_TYPE_JPG = 'JPG';
    public const ASSET_TYPE_PNG = 'PNG';
    public const ASSET_TYPE_PDF = 'PDF';
    public const ASSET_TYPE_PPTX = 'PPTX';

    /**
     * The file name of the asset, including the file extension.
     *
     * @var string
     */
    private string $name;

    /**
     * The file type of the asset.
     *
     * @var string
     */
    private string $type;

    /**
     * The URL of the asset.
     *
     * @var string
     */
    private string $url;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UploadAsset
     */
    public function setName(string $name): UploadAsset
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
     * @return UploadAsset
     */
    public function setType(string $type): UploadAsset
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return UploadAsset
     */
    public function setUrl(string $url): UploadAsset
    {
        $this->url = $url;
        return $this;
    }
}
