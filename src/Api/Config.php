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
use Zibios\WrikePhpSdk\Enums\ResponseModeEnum;

/**
 * Config
 */
class Config implements ConfigInterface
{
    /******************************************
     * General Properties
     *****************************************/

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var string
     * @see ResponseModeEnum
     */
    protected $responseMode = ResponseModeEnum::DOCUMENT;

    /**
     * @var boolean
     */
    protected $wrikeExceptionsMode = false;

    /**
     * @var ResponseClassesConfig
     */
    protected $responseClasses;

    /**
     * @return ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param ClientInterface $client
     *
     * @return $this
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return SerializerInterface|null
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     * @param SerializerInterface|null $serializer
     *
     * @return $this
     */
    public function setSerializer(SerializerInterface $serializer = null)
    {
        $this->serializer = $serializer;

        return $this;
    }

    /**
     * @see ResponseModeEnum
     * @return string
     */
    public function getResponseMode()
    {
        return $this->responseMode;
    }

    /**
     * @param string $responseMode
     *
     * @see ResponseModeEnum
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setResponseMode($responseMode)
    {
        ResponseModeEnum::assertIsValidValue($responseMode);
        $this->responseMode = $responseMode;

        return $this;
    }

    /**
     * @return bool
     */
    public function isWrikeExceptionsMode()
    {
        return (boolean) $this->wrikeExceptionsMode;
    }

    /**
     * @param bool $wrikeExceptionsMode
     *
     * @return $this
     */
    public function setWrikeExceptionsMode($wrikeExceptionsMode)
    {
        $this->wrikeExceptionsMode = (boolean) $wrikeExceptionsMode;

        return $this;
    }

    /**
     * @return ResponseClassesConfig
     */
    public function getResponseClasses()
    {
        if ($this->responseClasses === null) {
            $this->responseClasses = new ResponseClassesConfig();
        }

        return $this->responseClasses;
    }

    /**
     * @param ResponseClassesConfig $responseClasses
     *
     * @return $this
     */
    public function setResponseClasses(ResponseClassesConfig $responseClasses)
    {
        $this->responseClasses = $responseClasses;

        return $this;
    }
}
