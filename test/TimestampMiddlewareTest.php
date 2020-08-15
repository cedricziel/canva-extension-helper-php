<?php

namespace Canva;

use Http\Message\ResponseFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;

class TimestampMiddlewareTest extends TestCase
{
    public function testWillDeclineRequestsWithoutTimestampHeader(): void
    {
        $logger = $this->createMock(LoggerInterface::class);

        $response = $this->createMock(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn(401);

        $responseFactory = $this->createMock(ResponseFactory::class);
        $responseFactory->expects(self::once())->method('createResponse')->with(401)->willReturn($response);

        $handler = $this->createMock(RequestHandlerInterface::class);
        $handler->method('handle')->willReturn($response);

        $request = $this->createMock(ServerRequestInterface::class);
        $request->method('hasHeader')->with(Request::HEADER_TIMESTAMP)->willReturn(false);

        (new TimestampMiddleware($logger, $responseFactory))->process($request, $handler);
    }

    /**
     * @dataProvider provideTimestamps
     *
     * @param int $sentTimestamp
     * @param int $receivedAt
     * @param bool $valid
     */
    public function testWillDeclineWithIncorrectTimestamps(int $sentTimestamp, int $receivedAt, bool $valid): void
    {
        $logger = $this->createMock(LoggerInterface::class);

        $response = $this->createMock(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn(401);

        $responseFactory = $this->createMock(ResponseFactory::class);
        $responseFactory->expects(self::once())->method('createResponse')
            ->with(401)->willReturn($response);

        $handler = $this->createMock(RequestHandlerInterface::class);
        $handler->method('handle')->willReturn($response);

        $request = $this->createMock(ServerRequestInterface::class);
        $request->method('hasHeader')->with(Request::HEADER_TIMESTAMP)->willReturn(true);
        $request->expects(self::once())->method('getHeader')
            ->with(Request::HEADER_TIMESTAMP)->willReturn($sentTimestamp);

        (new TimestampMiddleware($logger, $responseFactory))->process($request, $handler);
    }

    public function provideTimestamps(): array
    {
        return [
            [1590980773, 1590980273, false],
            [1590980773, 1590981273, false],
        ];
    }
}
