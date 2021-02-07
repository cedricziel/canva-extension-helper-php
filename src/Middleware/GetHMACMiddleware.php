<?php

declare(strict_types=1);

namespace Canva\Middleware;

use Canva\HttpHelper;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;

/**
 * Verify an incoming GET request from canva.
 *
 * @see https://www.canva.com/developers/docs/verify-get-request-signature/
 */
class GetHMACMiddleware implements MiddlewareInterface
{
    private LoggerInterface $logger;

    private ResponseFactoryInterface $responseFactory;

    /**
     * The secret provided by canva.
     */
    private string $secret;

    public function __construct(LoggerInterface $logger, ResponseFactoryInterface $responseFactory, string $secret)
    {
        $this->logger = $logger;
        $this->responseFactory = $responseFactory;
        $this->secret = $secret;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (!HttpHelper::checkPsrGetRequestSignature($request, $this->secret)) {
            $this->logger->error('Calculated signature does not match any of the given signatures. Denying request.');

            return $this->responseFactory->createResponse(401);
        }

        return $handler->handle($request);
    }
}
