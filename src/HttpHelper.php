<?php
declare(strict_types=1);

namespace Canva;

class HttpHelper
{
    /**
     * @see https://www.canva.com/developers/docs/verify-timestamp#php
     *
     * @param int $sentAtSeconds
     * @param int $receivedAtSeconds
     * @param int $leniencyInSeconds
     *
     * @return bool
     */
    public static function verifyTimestamp(int $sentAtSeconds, int $receivedAtSeconds, int $leniencyInSeconds = 300): bool
    {
        return abs($sentAtSeconds - $receivedAtSeconds) < $leniencyInSeconds;
    }
}
