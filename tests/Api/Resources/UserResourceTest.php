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

use Zibios\WrikePhpSdk\Api\Resources\UserResource;
use Zibios\WrikePhpSdk\Enums\RequestPathFormatEnum;
use Zibios\WrikePhpSdk\Enums\ResourceMethodEnum;
use Zibios\WrikePhpSdk\Enums\ResponseClassEnum;
use Zibios\WrikePhpSdk\Tests\Api\ResourceTestCase;

/**
 * User Resource Test
 */
class UserResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = UserResource::class;

    /**
     * @return array
     */
    public function methodsProvider()
    {
        $baseData = [
            'endpointPath' => sprintf(RequestPathFormatEnum::USERS_BY_ID, self::UNIQUE_ID),
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceGetter' => 'getUserResource',
            'propertyGetter' => 'getId',
            'propertyValue' => self::VALID_ID,
            'responseClass' => ResponseClassEnum::USER,
            'additionalParams' => [self::UNIQUE_ID],
        ];

        return [
            [
                $baseData + ['methodName' => ResourceMethodEnum::GET_BY_ID],
            ],
            [
                $baseData + ['methodName' => ResourceMethodEnum::UPDATE],
            ],
        ];
    }
}
