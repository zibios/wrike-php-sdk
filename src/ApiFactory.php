<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk;

use Zibios\WrikePhpGuzzle\ClientFactory;
use Zibios\WrikePhpJmsserializer\Transformer\Response\ResponseModelTransformer;
use Zibios\WrikePhpJmsserializer\SerializerFactory;
use Zibios\WrikePhpLibrary\Api;

/**
 * Api Factory
 */
class ApiFactory
{
    /**
     * @return Api
     * @throws \InvalidArgumentException
     */
    public static function create()
    {
        $client = ClientFactory::create();
        $serializer = SerializerFactory::createSerializer();
        $responseTransformer = new ResponseModelTransformer($serializer);

        return new Api($client, $responseTransformer);
    }

    /**
     * @param string $bearerToken
     *
     * @return Api
     * @throws \InvalidArgumentException
     */
    public static function createForBearerToken($bearerToken)
    {
        $api = self::create();
        $api->setBearerToken($bearerToken);

        return $api;
    }
}
