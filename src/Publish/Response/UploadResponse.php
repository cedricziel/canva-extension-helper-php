<?php

declare(strict_types=1);

namespace Canva\Publish\Response;

use Canva\Response;

class UploadResponse implements Response
{
    /**
     * The type of response.
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

    public function __construct(string $type = Response::SUCCESS, ?string $id = null, ?string $url = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->url = $url;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): UploadResponse
    {
        $this->type = $type;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): UploadResponse
    {
        $this->id = $id;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): UploadResponse
    {
        $this->url = $url;

        return $this;
    }
}
