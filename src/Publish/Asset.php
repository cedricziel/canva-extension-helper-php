<?php

namespace Canva\Publish;

/**
 * @see https://www.canva.com/developers/docs/publish-extensions/api/post-publish-resources-upload/
 */
class Asset
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
     * @return Asset
     */
    public function setName(string $name): Asset
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
     * @return Asset
     */
    public function setType(string $type): Asset
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
     * @return Asset
     */
    public function setUrl(string $url): Asset
    {
        $this->url = $url;
        return $this;
    }
}
