<?php
declare(strict_types=1);

namespace Canva\Publish\Response;

use Canva\Response;

/**
 * If a publish extension is unable to return a "SUCCESS" response, it should return an "ERROR" response.
 *
 * If a request signature cannot be verified, an "ERROR" response should not be returned.
 * You should respond to the request with a status code of 401.
 *
 * Canva expects all responses -- even "ERROR" responses -- to have a status code of 200.
 *
 * @see https://www.canva.com/developers/docs/publish-extensions/error-handling/
 */
class ErrorResponse extends \Canva\ErrorResponse
{
}
