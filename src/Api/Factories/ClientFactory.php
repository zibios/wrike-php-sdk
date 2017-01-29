<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Api\Factories;

use Zibios\WrikePhpSdk\Api\Client;

/**
 * Client Factory
 */
class ClientFactory
{
    /**
     * @param string $bearerToken
     *
     * @return Client
     * @throws \InvalidArgumentException
     */
    public static function createClientForBearerToken($bearerToken)
    {
        self::assertIsValidBearerToken($bearerToken);

        return new Client(
            [
                'headers' => [
                    'Authorization' => sprintf('Bearer %s', $bearerToken)
                ],
            ]
        );
    }

    /**
     * @param string $bearerToken
     *
     * @throws \InvalidArgumentException
     */
    private static function assertIsValidBearerToken($bearerToken)
    {
        if (is_string($bearerToken) === false || trim($bearerToken) === '') {
            throw new \InvalidArgumentException('Bearer Token should be a none empty string!');
        }
    }
}
