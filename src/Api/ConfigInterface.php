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

use GuzzleHttp\ClientInterface;
use JMS\Serializer\SerializerInterface;
use Zibios\WrikePhpSdk\Api\Configs\ResponseClassesConfig;

/**
 * Config Interface
 */
interface ConfigInterface
{
    /**
     * @return ClientInterface
     */
    public function getClient();

    /**
     * @param ClientInterface $client
     *
     * @return $this
     */
    public function setClient(ClientInterface $client);

    /**
     * @return SerializerInterface|null
     */
    public function getSerializer();

    /**
     * @param SerializerInterface|null $serializer
     *
     * @return $this
     */
    public function setSerializer(SerializerInterface $serializer = null);

    /**
     * @see ResponseModeEnum
     * @return string
     */
    public function getResponseMode();

    /**
     * @param string $responseMode
     *
     * @see ResponseModeEnum
     * @return $this
     */
    public function setResponseMode($responseMode);

    /**
     * @return bool
     */
    public function isWrikeExceptionsMode();

    /**
     * @param bool $wrikeExceptionsMode
     *
     * @return $this
     */
    public function setWrikeExceptionsMode($wrikeExceptionsMode);

    /**
     * @return ResponseClassesConfig
     */
    public function getResponseClasses();

    /**
     * @param ResponseClassesConfig $responseClasses
     *
     * @return $this
     */
    public function setResponseClasses(ResponseClassesConfig $responseClasses);
}
