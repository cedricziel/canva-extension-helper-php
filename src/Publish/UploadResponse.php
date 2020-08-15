<?php

namespace Canva\Publish;

use Canva\Response;

class UploadResponse implements Response
{
    /**
     * The type of response.
     *
     * @var string
     */
    private string $type;

    /**
     * @var ?string
     */
    private ?string $id;

    /**
     * The URL of the published design.
     *
     * @var ?string
     */
    private ?string $url;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return UploadResponse
     */
    public function setType(string $type): UploadResponse
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return UploadResponse
     */
    public function setId(?string $id): UploadResponse
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return UploadResponse
     */
    public function setUrl(?string $url): UploadResponse
    {
        $this->url = $url;
        return $this;
    }
}
