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

use Zibios\WrikePhpSdk\Api;
use Zibios\WrikePhpSdk\Api\Config;
use Zibios\WrikePhpSdk\Enums\ResponseModeEnum;

/**
 * Api Factory
 */
class ApiFactory
{
    /**
     * @param string $bearerToken
     *
     * @return Api
     * @throws \InvalidArgumentException
     */
    public static function createApiForBearerToken($bearerToken)
    {
        $config = new Config();
        $config
            ->setClient(ClientFactory::createClientForBearerToken($bearerToken))
            ->setSerializer(SerializerFactory::createSerializer())
            ->setResponseMode(ResponseModeEnum::DOCUMENT)
            ->setWrikeExceptionsMode(false);

        return new Api($config);
    }
}
