<?php

namespace Canva\Configuration\Response;

use Canva\Response;

class ConfigurationSuccessResponse implements Response
{
    /**
     * The type(s) of extensions that have been successfully configured.
     */
    private array $labels;

    /**
     * The type of response.
     */
    private string $type;

    public function getLabels(): array
    {
        return $this->labels;
    }

    public function setLabels(array $labels): ConfigurationSuccessResponse
    {
        $this->labels = $labels;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): ConfigurationSuccessResponse
    {
        $this->type = $type;

        return $this;
    }
}
