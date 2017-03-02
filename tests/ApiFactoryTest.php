<?php

/*
 * This file is part of the zibios/wrike-php-sdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests;

use Zibios\WrikePhpLibrary\Api;
use Zibios\WrikePhpLibrary\ApiInterface;
use Zibios\WrikePhpLibrary\ImmutableApiInterface;
use Zibios\WrikePhpSdk\ApiFactory;

/**
 * Api Factory Test.
 */
class ApiFactoryTest extends TestCase
{
    const TOKEN = 'properToken';

    public function test_create()
    {
        $api = ApiFactory::create();
        self::assertInstanceOf(Api::class, $api);
        self::assertInstanceOf(ApiInterface::class, $api);
        self::assertInstanceOf(ImmutableApiInterface::class, $api);
    }

    /**
     * @return array
     */
    public function tokenProvider()
    {
        return [
            // [token, isValid]
            ['properToken', true],
            ['', true],
            [new \stdClass(), false],
            [null, false],
        ];
    }

    /**
     * @param mixed $token
     * @param bool  $isValid
     *
     * @dataProvider tokenProvider
     */
    public function test_createWithAccessToken($token, $isValid)
    {
        $exceptionOccurred = false;
        try {
            ApiFactory::create($token);
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
