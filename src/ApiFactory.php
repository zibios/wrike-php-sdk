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
use Zibios\WrikePhpGuzzle\Transformer\ApiException\WrikeTransformer;
use Zibios\WrikePhpLibrary\Api;
use Zibios\WrikePhpLibrary\ImmutableApi;
use Zibios\WrikePhpLibrary\Traits\AssertIsValidBearerToken;
use Zibios\WrikePhpLibrary\Transformer\Response\Psr\ArrayBodyTransformer;

/**
 * Api Factory.
 */
class ApiFactory
{
    use AssertIsValidBearerToken;

    /**
     * @param string|null $bearerToken
     *
     * @throws \InvalidArgumentException
     *
     * @return Api
     */
    public static function create($bearerToken = '')
    {
        $client = ClientFactory::create();
        $responseTransformer = new ArrayBodyTransformer();
        $apiExceptionTransformer = new WrikeTransformer();

        return new Api($client, $responseTransformer, $apiExceptionTransformer, $bearerToken);
    }

    /**
     * @param string|null $bearerToken
     *
     * @throws \InvalidArgumentException
     *
     * @return ImmutableApi
     */
    public static function createImmutable($bearerToken = '')
    {
        $client = ClientFactory::create();
        $responseTransformer = new ArrayBodyTransformer();
        $apiExceptionTransformer = new WrikeTransformer();

        return new ImmutableApi($client, $responseTransformer, $apiExceptionTransformer, $bearerToken);
    }
}
