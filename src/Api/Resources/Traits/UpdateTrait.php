<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Api\Resources\Traits;

use Zibios\WrikePhpSdk\Enums\RequestMethodEnum;
use Zibios\WrikePhpSdk\Enums\ResourceMethodEnum;

/**
 * Update Trait
 */
trait UpdateTrait
{
    /**
     * @param string $id
     * @param array|null $params
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
    public function update($id, array $params = [])
    {
        return $this->request(
            RequestMethodEnum::PUT,
            ResourceMethodEnum::UPDATE,
            $params,
            $id
        );
    }

    /**
     * @param string $requestMethod
     * @param string $requestScope
     * @param array $options
     * @param string|array $id
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
    abstract protected function request($requestMethod, $requestScope, array $options, $id);
}
