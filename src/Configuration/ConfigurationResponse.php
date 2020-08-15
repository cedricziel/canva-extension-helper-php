<?php

namespace Canva\Configuration;

class ConfigurationResponse
{
    public const TYPE_PUBLISH = 'PUBLISH';

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
     * @return ConfigurationResponse
     */
    public function setLabels(array $labels): ConfigurationResponse
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
     * @return ConfigurationResponse
     */
    public function setType(string $type): ConfigurationResponse
    {
        $this->type = $type;
        return $this;
    }
}
