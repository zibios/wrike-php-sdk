<?php

/*
 * This file is part of the zibios/wrike-php-sdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk;

use Zibios\WrikePhpGuzzle\ClientFactory;
use Zibios\WrikePhpLibrary\Api;
use Zibios\WrikePhpLibrary\Transformer\Response\ArrayBodyTransformer;

/**
 * Api Factory.
 */
class ApiFactory
{
    /**
     * @throws \InvalidArgumentException
     *
     * @return Api
     */
    public static function create()
    {
        $client = ClientFactory::create();
        $responseTransformer = new ArrayBodyTransformer();

        return new Api($client, $responseTransformer);
    }

    /**
     * @param string $bearerToken
     *
     * @throws \InvalidArgumentException
     *
     * @return Api
     */
    public static function createForBearerToken($bearerToken)
    {
        $api = self::create();
        $api->setBearerToken($bearerToken);

        return $api;
    }
}
