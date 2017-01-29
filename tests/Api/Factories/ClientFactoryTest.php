<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Api\Factories;

use GuzzleHttp\ClientInterface;
use Zibios\WrikePhpSdk\Api\Client;
use Zibios\WrikePhpSdk\Api\Factories\ClientFactory;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Client Factory Test
 */
class ClientFactoryTest extends TestCase
{
    public function test_createClientForBearerToken()
    {
        $testToken = 'testToken';

        $client = ClientFactory::createClientForBearerToken($testToken);
        self::assertInstanceOf(ClientInterface::class, $client);
        self::assertInstanceOf(Client::class, $client);
        self::assertSame(sprintf('Bearer %s', $testToken), $client->getConfig('headers')['Authorization']);
    }

    /**
     * @return array
     */
    public function tokenProvider()
    {
        return [
            // [token, isValid]
            ['properToken', true],
            [new \stdClass(), false],
            ['', false],
            [null, false],
        ];
    }

    /**
     * @param mixed $token
     * @param boolean $isValid
     *
     * @dataProvider tokenProvider
     */
    public function test_ConstructorParams($token, $isValid)
    {
        $exceptionOccurred = false;
        try {
            ClientFactory::createClientForBearerToken($token);
        } catch (\Exception $e) {
            $exceptionOccurred = true;
        }

        if ($isValid === false) {
            self::assertTrue($exceptionOccurred);
        }
        if ($isValid === true) {
            self::assertFalse($exceptionOccurred);
        }
    }
}
