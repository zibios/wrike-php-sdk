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
use Zibios\WrikePhpSdk\Api\Resources\Traits\CreateInAccountTrait;
use Zibios\WrikePhpSdk\Api\Resources\Traits\DeleteTrait;
use Zibios\WrikePhpSdk\Api\Resources\Traits\GetAllInAccountTrait;
use Zibios\WrikePhpSdk\Api\Resources\Traits\UpdateTrait;
use Zibios\WrikePhpSdk\Enums\RequestPathFormatEnum;
use Zibios\WrikePhpSdk\Enums\ResourceMethodEnum;

/**
 * Invitation Resource
 */
class InvitationResource extends ResourceAbstract
{
    use GetAllInAccountTrait;
    use CreateInAccountTrait;
    use UpdateTrait;
    use DeleteTrait;

    /**
     * @return string
     */
    protected function getResponseClass()
    {
        return $this->getConfig()->getResponseClasses()->getInvitationResponseClass();
    }

    /**
     * @return array
     */
    protected function getResourceMethodConfiguration()
    {
        return [
            ResourceMethodEnum::GET_ALL_IN_ACCOUNT => RequestPathFormatEnum::INVITATIONS_IN_ACCOUNT,
            ResourceMethodEnum::CREATE_IN_ACCOUNT => RequestPathFormatEnum::INVITATIONS_IN_ACCOUNT,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::INVITATIONS_BY_ID,
            ResourceMethodEnum::DELETE => RequestPathFormatEnum::INVITATIONS_BY_ID,
        ];
    }
}
