<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Api;

use GuzzleHttp\Client as BaseClient;

/**
 * Client
 */
class Client extends BaseClient
{
    const BASE_URI = 'https://www.wrike.com/api/v3/';

    /**
     * @param array $config
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $config = [])
    {
        $config = $this->prepareConfig($config);
        parent::__construct($config);
    }

    /**
     * @param array $config
     *
     * @return array
     */
    private function prepareConfig(array $config)
    {
        if (array_key_exists('base_uri', $config) === false
            || $config['base_uri'] === ''
            || $config['base_uri'] === null
        ) {
            $config['base_uri'] = self::BASE_URI;
        }

        return $config;
    }
}
