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

use Zibios\WrikePhpSdk\Documents\ResponseDocumentInterface;
use Zibios\WrikePhpSdk\Enums\RequestMethodEnum;
use Zibios\WrikePhpSdk\Enums\ResourceMethodEnum;
use Zibios\WrikePhpSdk\Enums\ResponseModeEnum;
use Zibios\WrikePhpSdk\Exceptions\Api\ApiException;

/**
 * Resource Abstract
 */
abstract class ResourceAbstract implements ResourceInterface
{
    const ASSERT_TYPE_NULL = 'null';
    const ASSERT_TYPE_STRING = 'string';
    const ASSERT_TYPE_ARRAY = 'array';

    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @return string
     */
    abstract protected function getResponseClass();

    /**
     * @return array
     */
    abstract protected function getResourceMethodConfiguration();

    /**
     * @return ConfigInterface
     */
    protected function getConfig()
    {
        return $this->config;
    }

    /**
     * @param ConfigInterface $config
     *
     * @return $this
     */
    protected function setConfig(ConfigInterface $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @param string $requestMethod
     * @param string $resourceMethod
     * @param array $params
     * @param string|array|null $id
     *
     * @return mixed
     * @throws \LogicException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     * @throws \InvalidArgumentException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\ApiException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\AccessForbiddenException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\InvalidParameterException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\InvalidRequestException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\NotAllowedException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\NotAuthorizedException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\ParameterRequiredException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\ResourceNotFoundException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\ServerErrorException
     */
    protected function request($requestMethod, $resourceMethod, array $params, $id)
    {
        RequestMethodEnum::assertIsValidValue($requestMethod);
        ResourceMethodEnum::assertIsValidValue($resourceMethod);
        return $this->executeRequest(
            $requestMethod,
            $this->prepareRequestPathForResourceMethod($resourceMethod, $id),
            $this->prepareRequestOptionsForRequestMethod($requestMethod, $params),
            $this->getResponseClass()
        );
    }

    /**
     * @param string $requestMethod
     * @param string $path
     * @param array $options
     * @param string $responseDocumentClass
     *
     * @return mixed
     * @throws \LogicException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     * @throws \InvalidArgumentException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\ApiException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\AccessForbiddenException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\InvalidParameterException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\InvalidRequestException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\NotAllowedException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\NotAuthorizedException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\ParameterRequiredException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\ResourceNotFoundException
     * @throws \Zibios\WrikePhpSdk\Exceptions\Api\ServerErrorException
     */
    private function executeRequest($requestMethod, $path, array $options, $responseDocumentClass)
    {
        $client = $this->getConfig()->getClient();

        $response = null;
        try {
            $response = $client->request($requestMethod, $path, $options);
        } catch (\Exception $e) {
            if ($this->getConfig()->isWrikeExceptionsMode()) {
                throw ApiException::create($e);
            }
            throw $e;
        }

        $responseMode = $this->getConfig()->getResponseMode();
        ResponseModeEnum::assertIsValidValue($responseMode);

        if ($responseMode === ResponseModeEnum::RESPONSE_RAW) {
            return $response;
        }

        $bodyString = (string) $response->getBody();
        if ($responseMode === ResponseModeEnum::BODY_STRING) {
            return $bodyString;
        }

        if ($responseMode === ResponseModeEnum::BODY_OBJECT) {
            return json_decode($bodyString, true);
        }

        /** @var ResponseDocumentInterface $responseDocument */
        $responseDocument = $this->getConfig()->getSerializer()->deserialize(
            (string) $response->getBody(),
            $responseDocumentClass,
            'json'
        );
        if ($responseMode === ResponseModeEnum::BODY_DOCUMENT) {
            return $responseDocument;
        }

        if ($responseMode === ResponseModeEnum::DOCUMENT) {
            return $responseDocument->getData();
        }

        throw new \LogicException();
    }

    /**
     * @param mixed $value
     * @param string $type
     *
     * @throws \InvalidArgumentException
     */
    private function assertIsValidId($value, $type)
    {
        switch ($type) {
            case self::ASSERT_TYPE_NULL:
                if ($value !== null) {
                    throw new \InvalidArgumentException();
                }
                break;
            case self::ASSERT_TYPE_STRING:
                if (is_string($value) === false || trim($value) === '' || strlen($value) > 128) {
                    throw new \InvalidArgumentException(sprintf('Invalid Id, should be not empty string!'));
                }
                break;
            case self::ASSERT_TYPE_ARRAY:
                if (is_array($value) === false) {
                    throw new \InvalidArgumentException();
                }
                /** @var array $value */
                foreach ($value as $id) {
                    $this->assertIsValidId($id, self::ASSERT_TYPE_STRING);
                }
                break;
            default:
                throw new \InvalidArgumentException();
        }
    }

    /**
     * @param string $resourceMethod
     * @param string|array|null $id
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    private function prepareRequestPathForResourceMethod($resourceMethod, $id)
    {
        $resourceMethodConfiguration = $this->getResourceMethodConfiguration();
        if (array_key_exists($resourceMethod, $resourceMethodConfiguration) === false) {
            throw new \InvalidArgumentException();
        }
        $requestPathFormat = $resourceMethodConfiguration[$resourceMethod];

        switch ($resourceMethod) {
            case ResourceMethodEnum::GET_ALL:
                $this->assertIsValidId($id, self::ASSERT_TYPE_NULL);
                return sprintf($requestPathFormat, $id);
            case ResourceMethodEnum::GET_BY_IDS:
                $this->assertIsValidId($id, self::ASSERT_TYPE_ARRAY);
                return sprintf($requestPathFormat, implode(',', $id));
            case ResourceMethodEnum::GET_ALL_IN_ACCOUNT:
            case ResourceMethodEnum::CREATE_IN_ACCOUNT:
            case ResourceMethodEnum::GET_BY_ID:
            case ResourceMethodEnum::UPDATE:
            case ResourceMethodEnum::DELETE:
                $this->assertIsValidId($id, self::ASSERT_TYPE_STRING);
                return sprintf($requestPathFormat, $id);
            default:
                throw new \InvalidArgumentException(sprintf('"%s" resource method not yet supported', $resourceMethod));
        }
    }

    /**
     * @param string $requestMethod
     * @param array $params
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    protected function prepareRequestOptionsForRequestMethod($requestMethod, array $params)
    {
        $options = [
            'headers' => ['Content-Type' => 'application/json'],
        ];

        switch ($requestMethod) {
            case RequestMethodEnum::GET:
                if (count($params) > 0) {
                    $options['query'] = $params;
                }
                break;
            case RequestMethodEnum::PUT:
            case RequestMethodEnum::POST:
                if (count($params) > 0) {
                    $options['body'] = $this->getConfig()->getSerializer()->serialize($params, 'json');
                }
                break;
            case RequestMethodEnum::DELETE:
                break;
            default:
                throw new \InvalidArgumentException();
        }

        return $options;
    }
}
