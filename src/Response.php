<?php

namespace Canva;

interface Response
{
    public const SUCCESS = 'SUCCESS';
    public const ERROR = 'ERROR';

    public function getType(): string;
}
