<?php

declare(strict_types=1);

namespace Canva\Content\Request;

use Canva\Request;

class FindRequest implements Request
{
    public const TYPE_CONTAINER = 'CONTAINER';
    public const TYPE_EMBED = 'EMBED';
    public const TYPE_IMAGE = 'IMAGE';

    /**
     * The ID of the user.
     */
    private string $user;

    /**
     * The ID of the user's team.
     */
    private string $brand;

    /**
     * The type of extension that sent the request.
     */
    private string $label;

    /**
     * The maximum number of resources to provide in a response.
     */
    private int $limit;

    /**
     * The user’s locale as an IETF BCP 47 language tag.
     *
     * @see https://en.wikipedia.org/wiki/IETF_language_tag
     */
    private string $locale;

    /**
     * The type of resources the extension must provide in the response.
     * Enum: "CONTAINER", "EMBED", "IMAGE".
     */
    private string $type;

    /**
     * A token for paginating resources.
     */
    private ?string $continuation;

    /**
     * The ID of the selected container.
     */
    private ?string $containerId;

    /**
     * A user-provided search query.
     */
    private ?string $query;

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): FindRequest
    {
        $this->user = $user;

        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): FindRequest
    {
        $this->brand = $brand;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): FindRequest
    {
        $this->label = $label;

        return $this;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): FindRequest
    {
        $this->limit = $limit;

        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): FindRequest
    {
        $this->locale = $locale;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): FindRequest
    {
        $this->type = $type;

        return $this;
    }

    public function getContinuation(): ?string
    {
        return $this->continuation;
    }

    public function setContinuation(?string $continuation): FindRequest
    {
        $this->continuation = $continuation;

        return $this;
    }

    public function getContainerId(): ?string
    {
        return $this->containerId;
    }

    public function setContainerId(?string $containerId): FindRequest
    {
        $this->containerId = $containerId;

        return $this;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function setQuery(?string $query): FindRequest
    {
        $this->query = $query;

        return $this;
    }
}
