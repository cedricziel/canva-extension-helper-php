<?php

declare(strict_types=1);

namespace Canva;

interface Request
{
    public const HEADER_TIMESTAMP = 'X-Canva-Timestamp';
    public const HEADER_SIGNATURES = 'X-Canva-Signatures';
    public const PATH_CONFIGURATION = 'configuration';
}
