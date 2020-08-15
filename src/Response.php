<?php

namespace Canva;

interface Response
{
    public const SUCCESS = 'SUCCESS';
    public const ERROR = 'ERROR';

    public function setType(string $type): Response;
    public function getType(): string;
}
