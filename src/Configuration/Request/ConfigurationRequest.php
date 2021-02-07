<?php

namespace Canva\Configuration\Request;

use Canva\Request;

class ConfigurationRequest implements Request
{
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
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return ConfigurationRequest
     */
    public function setUser(string $user): ConfigurationRequest
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
     * @return ConfigurationRequest
     */
    public function setBrand(string $brand): ConfigurationRequest
    {
        $this->brand = $brand;
        return $this;
    }
}
