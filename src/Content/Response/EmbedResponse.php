<?php
declare(strict_types=1);

namespace Canva\Content\Response;

use Canva\Content\ContentEmbed;
use Canva\Response;

class EmbedResponse implements Response
{
    /**
     * The type of response.
     *
     * @var string
     */
    private string $type;

    /**
     * The embeds to render in the side panel.
     *
     * @var array|ContentEmbed[]
     */
    private array $resources;

    /**
     * A token for paginating resources.
     *
     * @var string|null
     */
    private ?string $continuation;

    public function __construct(array $resources = [])
    {
        $this->type = Response::SUCCESS;
        $this->resources = $resources;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array|ContentEmbed[]
     */
    public function getResources(): array
    {
        return $this->resources;
    }

    /**
     * @param array|ContentEmbed[] $resources
     * @return EmbedResponse
     */
    public function setResources(array $resources = []): EmbedResponse
    {
        $this->resources = $resources;
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
     * @return EmbedResponse
     */
    public function setContinuation(?string $continuation): EmbedResponse
    {
        $this->continuation = $continuation;
        return $this;
    }
}
