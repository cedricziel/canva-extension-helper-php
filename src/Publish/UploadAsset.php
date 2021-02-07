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
     */
    private string $name;

    /**
     * The file type of the asset.
     */
    private string $type;

    /**
     * The URL of the asset.
     */
    private string $url;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): UploadAsset
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): UploadAsset
    {
        $this->type = $type;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): UploadAsset
    {
        $this->url = $url;

        return $this;
    }
}
