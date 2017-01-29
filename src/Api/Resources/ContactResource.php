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
use Zibios\WrikePhpSdk\Api\Resources\Traits\GetAllInAccountTrait;
use Zibios\WrikePhpSdk\Api\Resources\Traits\GetAllTrait;
use Zibios\WrikePhpSdk\Api\Resources\Traits\GetByIdsTrait;
use Zibios\WrikePhpSdk\Api\Resources\Traits\GetByIdTrait;
use Zibios\WrikePhpSdk\Api\Resources\Traits\UpdateTrait;
use Zibios\WrikePhpSdk\Enums\RequestPathFormatEnum;
use Zibios\WrikePhpSdk\Enums\ResourceMethodEnum;

/**
 * Contact Resource
 */
class ContactResource extends ResourceAbstract
{
    use GetAllTrait;
    use GetAllInAccountTrait;
    use GetByIdTrait;
    use GetByIdsTrait;
    use UpdateTrait;

    /**
     * @return string
     */
    protected function getResponseClass()
    {
        return $this->getConfig()->getResponseClasses()->getContactResponseClass();
    }

    /**
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::CONTACTS,
            ResourceMethodEnum::GET_ALL_IN_ACCOUNT => RequestPathFormatEnum::CONTACTS_IN_ACCOUNT,
            ResourceMethodEnum::GET_BY_ID => RequestPathFormatEnum::CONTACTS_BY_ID,
            ResourceMethodEnum::GET_BY_IDS => RequestPathFormatEnum::CONTACTS_BY_ID,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::CONTACTS_BY_ID,
        ];
    }
}
