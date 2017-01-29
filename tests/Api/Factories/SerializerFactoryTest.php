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

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;
use Zibios\WrikePhpSdk\Api\Factories\SerializerFactory;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Serializer Factory Test
 */
class SerializerFactoryTest extends TestCase
{
    public function test_createSerializer()
    {
        $serializer = SerializerFactory::createSerializer();
        self::assertInstanceOf(SerializerInterface::class, $serializer);
        self::assertInstanceOf(Serializer::class, $serializer);
    }
}
