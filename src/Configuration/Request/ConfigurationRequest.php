<?php

namespace Canva\Configuration\Request;

use Canva\Request;

class ConfigurationRequest implements Request
{
    /**
     * The ID of the user.
     */
    private string $user;

    /**
     * The ID of the user's team.
     */
    private string $brand;

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): ConfigurationRequest
    {
        $this->user = $user;

        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): ConfigurationRequest
    {
        $this->brand = $brand;

        return $this;
    }
}
