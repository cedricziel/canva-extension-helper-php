<?php

declare(strict_types=1);

namespace Canva;

/**
 * @see https://www.canva.com/developers/docs/publish-extensions/error-handling/
 */
class Error
{
    /**
     * The request is invalid.
     */
    public const CODE_INVALID_REQUEST = 'INVALID_REQUEST';

    /**
     * The extension requires configuration.
     */
    public const CODE_CONFIGURATION_REQUIRED = 'CONFIGURATION_REQUIRED';

    /**
     * The user does not have access to the resource.
     */
    public const CODE_FORBIDDEN = 'FORBIDDEN';

    /**
     * The resource(s) could not be found.
     */
    public const CODE_NOT_FOUND = 'NOT_FOUND';

    /**
     * The request has timed out.
     */
    public const CODE_TIMEOUT = 'TIMEOUT';

    /**
     * An unknown error has occurred.
     */
    public const CODE_INTERNAL_ERROR = 'INTERNAL_ERROR';
}
