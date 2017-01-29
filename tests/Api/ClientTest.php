<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Api;

use GuzzleHttp\ClientInterface;
use Zibios\WrikePhpSdk\Api\Client;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Client Test
 */
class ClientTest extends TestCase
{

    /**
     * Test exception inheritance
     */
    public function test_ExtendProperClasses()
    {
        $client =  new Client();
        self::assertInstanceOf(Client::class, $client);
        self::assertInstanceOf(ClientInterface::class, $client);
    }

    /**
     * @return array
     */
    public function constructorParamsProvider()
    {
        return [
            // [baseUri, expectedValue]
            ['test', 'test'],
            ['', Client::BASE_URI],
            [null, Client::BASE_URI],
        ];
    }

    /**
     * @param mixed $baseUri
     * @param boolean $expectedValue
     *
     * @dataProvider constructorParamsProvider
     */
    public function test_ConstructorParams($baseUri, $expectedValue)
    {
        $client =  new Client(['base_uri' => $baseUri]);
        self::assertInstanceOf(Client::class, $client);
        self::assertInstanceOf(ClientInterface::class, $client);
        self::assertSame($expectedValue, (string) $client->getConfig('base_uri'));
    }
}
