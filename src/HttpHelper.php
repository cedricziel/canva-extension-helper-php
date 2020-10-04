<?php
declare(strict_types=1);

namespace Canva;

use Psr\Http\Message\ServerRequestInterface;

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

    /**
     * Before an extension can generate a request signature, it must decode the app's client secret from a
     * base64url-encoded string into a byte array.
     *
     * @param string $secret
     * @return string
     */
    public static function decodeSecret(string $secret): string
    {
        return base64_decode(strtr($secret, '-_', '+/'));
    }

    /**
     * Checks if a PSR-7 GET request contains the correct hmac.
     *
     * @param ServerRequestInterface $request
     * @param string $secret
     *
     * @return bool
     */
    public static function checkPsrGetRequestSignature(ServerRequestInterface $request, string $secret): bool
    {
        $query = $request->getQueryParams();
        [
            'time' => $time,
            'user' => $user,
            'brand' => $brand,
            'extensions' => $extensions,
            'state' => $state,
            'signatures' => $signatures,

        ] = $query;

        $message = sprintf('v1:%s:%s:%s:%s:%s', $time, $user, $brand, $extensions, $state);

        $messageHmac = hash_hmac('sha256', $message, self::decodeSecret($secret));

        if (!is_array($signatures)) {
            return $messageHmac === $signatures;
        }

        return in_array($messageHmac, $signatures, true);
    }

    /**
     * Checks if a PSR-7 POST request contains the correct hmac.
     *
     * @param ServerRequestInterface $request
     * @param string $secret
     *
     * @return bool
     */
    public static function checkPsrPostRequestSignature(ServerRequestInterface $request, string $secret): bool
    {
        // Timestamp is needed to calculate the signature
        if (!$request->hasHeader(Request::HEADER_TIMESTAMP)) {
            return false;
        }

        $timestamp = $request->getHeader(Request::HEADER_TIMESTAMP)[0];
        if (!$request->hasHeader(Request::HEADER_SIGNATURES)) {
            return false;
        }

        $signatures = $request->getHeader(Request::HEADER_SIGNATURES);
        $signature = self::calculatePostSignature((int)$timestamp, $request->getUri()->getPath(), $request->getBody()->getContents(), $secret);

        return in_array($signature, $signatures);
    }

    public static function calculatePostSignature(int $timestamp, string $path, string $body, string $secret): string
    {
        $secret = self::decodeSecret($secret);
        $message = sprintf('v1:%s:%s:%s', $timestamp, $path, $body);

        return hash_hmac('sha256', $message, $secret);
    }
}
