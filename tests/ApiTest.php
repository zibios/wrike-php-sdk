<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests;

use Zibios\WrikePhpSdk\Api;
use Zibios\WrikePhpSdk\ApiInterface;

/**
 * Api Test
 */
class ApiTest extends TestCase
{
    /**
     * @return array
     */
    public function constructorParamsProvider()
    {
        return [
            // [config, isValid]
            [new Api\Config(), true],
            [new \stdClass(), false],
            ['', false],
            [null, false],
        ];
    }

    /**
     * @param mixed $config
     * @param boolean $isValid
     *
     * @dataProvider constructorParamsProvider
     */
    public function test_ConstructorParams($config, $isValid)
    {
        $exceptionOccurred = false;
        try {
            new Api($config);
        } catch (\Throwable $t) {
            $exceptionOccurred = true;
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

    public function test_ValidConstructorParams()
    {
        $config = new Api\Config();
        $configAlternate = new Api\Config();
        $api = new Api($config);

        self::assertInstanceOf(Api::class, $api);
        self::assertInstanceOf(ApiInterface::class, $api);

        self::assertInstanceOf(Api\Config::class, $api->getConfig());
        self::assertInstanceOf(Api\ConfigInterface::class, $api->getConfig());
        self::assertSame($config, $api->getConfig());
        self::assertNotSame($configAlternate, $api->getConfig());
    }

    public function test_getSetConfig()
    {
        $config = new Api\Config();
        $configAlternate = new Api\Config();
        $api = new Api($config);

        self::assertSame($config, $api->getConfig());
        $api->setConfig($configAlternate);
        self::assertSame($configAlternate, $api->getConfig());
    }

    public function test_getContactResource()
    {
        $config = new Api\Config();
        $api = new Api($config);
        $resourceOriginal = $api->getContactResource();

        self::assertInstanceOf(Api\Resources\ContactResource::class, $resourceOriginal);
        // The same object every time
        self::assertSame($resourceOriginal, $api->getContactResource());
        self::assertSame($resourceOriginal, $api->getContactResource());
    }

    public function test_getUserResource()
    {
        $config = new Api\Config();
        $api = new Api($config);
        $resourceOriginal = $api->getUserResource();

        self::assertInstanceOf(Api\Resources\UserResource::class, $resourceOriginal);
        // The same object every time
        self::assertSame($resourceOriginal, $api->getUserResource());
        self::assertSame($resourceOriginal, $api->getUserResource());
    }

    public function test_getGroupResource()
    {
        $config = new Api\Config();
        $api = new Api($config);
        $resourceOriginal = $api->getGroupResource();

        self::assertInstanceOf(Api\Resources\GroupResource::class, $resourceOriginal);
        // The same object every time
        self::assertSame($resourceOriginal, $api->getGroupResource());
        self::assertSame($resourceOriginal, $api->getGroupResource());
    }

    public function test_getInvitationResource()
    {
        $config = new Api\Config();
        $api = new Api($config);
        $resourceOriginal = $api->getInvitationResource();

        self::assertInstanceOf(Api\Resources\InvitationResource::class, $resourceOriginal);
        // The same object every time
        self::assertSame($resourceOriginal, $api->getInvitationResource());
        self::assertSame($resourceOriginal, $api->getInvitationResource());
    }

    /**
     * @return array
     */
    public function resourceProvider()
    {
        return [
            // [getResourceMethod, expectedResourceClass]
            ['getContactResource', Api\Resources\ContactResource::class],
            ['getUserResource', Api\Resources\UserResource::class],
            ['getGroupResource', Api\Resources\GroupResource::class],
        ];
    }

    /**
     * @param string $getResourceMethod
     * @param string $expectedResourceClass
     *
     * @dataProvider resourceProvider
     */
    public function test_getResourceMethods($getResourceMethod, $expectedResourceClass)
    {
        $config = new Api\Config();
        $api = new Api($config);
        $resourceOriginal = $api->{$getResourceMethod}();

        self::assertInstanceOf($expectedResourceClass, $resourceOriginal);
        // The same object every time
        self::assertSame($resourceOriginal, $api->{$getResourceMethod}());
        self::assertSame($resourceOriginal, $api->{$getResourceMethod}());
    }
}
