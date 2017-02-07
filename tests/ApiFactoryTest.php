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

use Zibios\WrikePhpLibrary\Api;
use Zibios\WrikePhpLibrary\ApiInterface;
use Zibios\WrikePhpSdk\ApiFactory;

/**
 * Api Factory Test
 */
class ApiFactoryTest extends TestCase
{
    const TOKEN = 'properToken';

    public function test_create()
    {
        $api = ApiFactory::create();
        self::assertInstanceOf(Api::class, $api);
        self::assertInstanceOf(ApiInterface::class, $api);
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
    public function test_createForBearerToken($token, $isValid)
    {
        $exceptionOccurred = false;
        try {
            ApiFactory::createForBearerToken($token);
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
