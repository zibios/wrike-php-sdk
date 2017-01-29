<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Api\Resources;

use Zibios\WrikePhpSdk\Api\ResourceAbstract;
use Zibios\WrikePhpSdk\Api\Resources\Traits\GetByIdTrait;
use Zibios\WrikePhpSdk\Api\Resources\Traits\UpdateTrait;
use Zibios\WrikePhpSdk\Enums\RequestPathFormatEnum;
use Zibios\WrikePhpSdk\Enums\ResourceMethodEnum;

/**
 * User Resource
 */
class UserResource extends ResourceAbstract
{
    use GetByIdTrait;
    use UpdateTrait;

    /**
     * @return string
     */
    protected function getResponseClass()
    {
        return $this->getConfig()->getResponseClasses()->getUserResponseClass();
    }

    /**
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::USERS_BY_ID,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::USERS_BY_ID,
        ];
    }
}
