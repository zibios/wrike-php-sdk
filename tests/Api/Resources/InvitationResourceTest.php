<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Api\Resources;

use Zibios\WrikePhpSdk\Api\Resources\InvitationResource;
use Zibios\WrikePhpSdk\Enums\RequestPathFormatEnum;
use Zibios\WrikePhpSdk\Enums\ResourceMethodEnum;
use Zibios\WrikePhpSdk\Enums\ResponseClassEnum;
use Zibios\WrikePhpSdk\Tests\Api\ResourceTestCase;

/**
 * Invitation Resource Test
 */
class InvitationResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = InvitationResource::class;

    /**
     * @return array
     */
    public function methodsProvider()
    {
        $baseData = [
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceGetter' => 'getInvitationResource',
            'propertyGetter' => 'getId',
            'propertyValue' => self::VALID_ID,
            'responseClass' => ResponseClassEnum::INVITATION,
        ];

        return [
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::GET_ALL_IN_ACCOUNT,
                    'endpointPath' => sprintf(RequestPathFormatEnum::INVITATIONS_IN_ACCOUNT, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::CREATE_IN_ACCOUNT,
                    'endpointPath' => sprintf(RequestPathFormatEnum::INVITATIONS_IN_ACCOUNT, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::UPDATE,
                    'endpointPath' => sprintf(RequestPathFormatEnum::INVITATIONS_BY_ID, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::DELETE,
                    'endpointPath' => sprintf(RequestPathFormatEnum::INVITATIONS_BY_ID, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
        ];
    }
}
