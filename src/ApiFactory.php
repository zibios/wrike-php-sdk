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
use Zibios\WrikePhpGuzzle\Transformer\ApiException\GuzzleTransformer;
use Zibios\WrikePhpLibrary\Api;
use Zibios\WrikePhpLibrary\Transformer\Response\Psr\ArrayBodyTransformer;

/**
 * Api Factory.
 */
class ApiFactory
{
    /**
     * @param string|null $accessToken
     *
     * @throws \InvalidArgumentException
     *
     * @return Api
     */
    public static function create($accessToken = '')
    {
        $client = ClientFactory::create();
        $responseTransformer = new ArrayBodyTransformer();
        $apiExceptionTransformer = new GuzzleTransformer();

        return new Api($client, $responseTransformer, $apiExceptionTransformer, $accessToken);
    }
}
