<?php

declare(strict_types=1);

namespace Canva\Middleware;

use Canva\HttpHelper;
use Canva\Request;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;

/**
 * Verify an incoming request from canva to prevent clock skew and intervention.
 *
 * This middleware can be mounted to all the extension endpoints you provide.
 *
 * @see https://www.canva.com/developers/docs/verify-timestamp/
 */
class TimestampMiddleware implements MiddlewareInterface
{
    /**
     * The grace period for comparison.
     */
    private int $leniency;

    private LoggerInterface $logger;

    private ResponseFactoryInterface $responseFactory;

    public function __construct(LoggerInterface $logger, ResponseFactoryInterface $responseFactory, int $leniency = 300)
    {
        $this->logger = $logger;
        $this->responseFactory = $responseFactory;
        $this->leniency = $leniency;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // check if the header is present, reject if not
        if (!$request->hasHeader(Request::HEADER_TIMESTAMP)) {
            $this->logger->error('Rejecting request. Timestamp not present where it should be.');

            return $this->responseFactory->createResponse(401);
        }

        $sentTimestamp = (int) $request->getHeader(Request::HEADER_TIMESTAMP);

        // Do the actual checking
        if (!HttpHelper::verifyTimestamp($sentTimestamp, $this->getReceivingTimestamp(), $this->leniency)) {
            $this->logger->error('Rejecting request. Timestamps are not close enough.');

            return $this->responseFactory->createResponse(401);
        }

        return $handler->handle($request);
    }

    /**
     * Gets the timestamp when the request was received. Ripped out for testing purposes.
     */
    protected function getReceivingTimestamp(): int
    {
        return time();
    }
}
