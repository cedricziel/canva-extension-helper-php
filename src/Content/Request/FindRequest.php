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
     *
     * @var string
     */
    private string $user;

    /**
     * The ID of the user's team.
     *
     * @var string
     */
    private string $brand;

    /**
     * The type of extension that sent the request.
     *
     * @var string
     */
    private string $label;

    /**
     * The maximum number of resources to provide in a response.
     *
     * @var int
     */
    private int $limit;

    /**
     * The user’s locale as an IETF BCP 47 language tag.
     *
     * @see https://en.wikipedia.org/wiki/IETF_language_tag
     *
     * @var string
     */
    private string $locale;

    /**
     * The type of resources the extension must provide in the response.
     * Enum: "CONTAINER", "EMBED", "IMAGE"
     *
     * @var string
     */
    private string $type;

    /**
     * A token for paginating resources.
     *
     * @var string|null
     */
    private ?string $continuation;

    /**
     * The ID of the selected container.
     *
     * @var string|null
     */
    private ?string $containerId;

    /**
     * A user-provided search query.
     *
     * @var string|null
     */
    private ?string $query;

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return FindRequest
     */
    public function setUser(string $user): FindRequest
    {
        $this->user = $user;
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
     * @return FindRequest
     */
    public function setBrand(string $brand): FindRequest
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
     * @return FindRequest
     */
    public function setLabel(string $label): FindRequest
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return FindRequest
     */
    public function setLimit(int $limit): FindRequest
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return FindRequest
     */
    public function setLocale(string $locale): FindRequest
    {
        $this->locale = $locale;
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
     * @return FindRequest
     */
    public function setType(string $type): FindRequest
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContinuation(): ?string
    {
        return $this->continuation;
    }

    /**
     * @param string|null $continuation
     * @return FindRequest
     */
    public function setContinuation(?string $continuation): FindRequest
    {
        $this->continuation = $continuation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContainerId(): ?string
    {
        return $this->containerId;
    }

    /**
     * @param string|null $containerId
     * @return FindRequest
     */
    public function setContainerId(?string $containerId): FindRequest
    {
        $this->containerId = $containerId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @param string|null $query
     * @return FindRequest
     */
    public function setQuery(?string $query): FindRequest
    {
        $this->query = $query;
        return $this;
    }
}
