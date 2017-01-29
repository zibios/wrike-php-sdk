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

use Zibios\WrikePhpSdk\Api\Config;
use Zibios\WrikePhpSdk\Api\ConfigInterface;
use Zibios\WrikePhpSdk\Api\Factories\ClientFactory;
use Zibios\WrikePhpSdk\Api\Factories\SerializerFactory;
use Zibios\WrikePhpSdk\Enums\ResponseModeEnum;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Config Test
 */
class ConfigTest extends TestCase
{

    /**
     * Test exception inheritance
     */
    public function test_ExtendProperClasses()
    {
        $client =  new Config();
        self::assertInstanceOf(Config::class, $client);
        self::assertInstanceOf(ConfigInterface::class, $client);
    }

    /**
     *
     */
    public function test_getSetClient()
    {
        $config = new Config();
        self::assertNull($config->getClient());

        $client = ClientFactory::createClientForBearerToken('test');
        $config->setClient($client);
        self::assertSame($client, $config->getClient());
    }

    /**
     *
     */
    public function test_getSetSerializer()
    {
        $config = new Config();
        self::assertNull($config->getSerializer());

        $serializer = SerializerFactory::createSerializer();
        $config->setSerializer($serializer);
        self::assertSame($serializer, $config->getSerializer());
    }

    /**
     *
     */
    public function test_getSetResponseMode()
    {
        $config = new Config();
        self::assertEquals(ResponseModeEnum::DOCUMENT, $config->getResponseMode());
        $config->setResponseMode(ResponseModeEnum::RESPONSE_RAW);
        self::assertSame(ResponseModeEnum::RESPONSE_RAW, $config->getResponseMode());
    }
}
