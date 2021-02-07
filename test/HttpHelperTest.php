<?php

declare(strict_types=1);

namespace Canva;

use PHPUnit\Framework\TestCase;

class HttpHelperTest extends TestCase
{
    public function testCanVerifyTimestamps(): void
    {
        // valid timestamp
        self::assertTrue(HttpHelper::verifyTimestamp(1590980773, 1590980773));
        self::assertTrue(HttpHelper::verifyTimestamp(1590980773, 1590980523));
        self::assertTrue(HttpHelper::verifyTimestamp(1590980773, 1590981023));

        // Invalid timestamps
        self::assertFalse(HttpHelper::verifyTimestamp(1590980773, 1590980273));
        self::assertFalse(HttpHelper::verifyTimestamp(1590980773, 1590981273));
    }
}
