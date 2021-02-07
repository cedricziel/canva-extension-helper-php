<?php

namespace Canva\Configuration\Response;

use Canva\Response;

class ConfigurationSuccessResponse implements Response
{
    /**
     * The type(s) of extensions that have been successfully configured.
     *
     * @var array
     */
    private array $labels;

    /**
     * The type of response.
     *
     * @var string
     */
    private string $type;

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     * @return ConfigurationSuccessResponse
     */
    public function setLabels(array $labels): ConfigurationSuccessResponse
    {
        $this->labels = $labels;
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
     * @return ConfigurationSuccessResponse
     */
    public function setType(string $type): ConfigurationSuccessResponse
    {
        $this->type = $type;
        return $this;
    }
}
