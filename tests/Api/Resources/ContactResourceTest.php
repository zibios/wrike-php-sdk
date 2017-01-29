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

use Zibios\WrikePhpSdk\Api\Resources\ContactResource;
use Zibios\WrikePhpSdk\Enums\RequestPathFormatEnum;
use Zibios\WrikePhpSdk\Enums\ResourceMethodEnum;
use Zibios\WrikePhpSdk\Enums\ResponseClassEnum;
use Zibios\WrikePhpSdk\Tests\Api\ResourceTestCase;

/**
 * Contact Resource Test
 */
class ContactResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = ContactResource::class;

    /**
     * @return array
     */
    public function methodsProvider()
    {
        $baseData = [
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceGetter' => 'getContactResource',
            'propertyGetter' => 'getId',
            'propertyValue' => self::VALID_ID,
            'responseClass' => ResponseClassEnum::CONTACT,
        ];

        return [
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::GET_ALL,
                    'endpointPath' => RequestPathFormatEnum::CONTACTS,
                    'additionalParams' => [],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::GET_ALL_IN_ACCOUNT,
                    'endpointPath' => sprintf(RequestPathFormatEnum::CONTACTS_IN_ACCOUNT, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::GET_BY_ID,
                    'endpointPath' => sprintf(RequestPathFormatEnum::CONTACTS_BY_ID, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::GET_BY_IDS,
                    'endpointPath' => sprintf(RequestPathFormatEnum::CONTACTS_BY_ID, implode(',', [self::UNIQUE_ID])),
                    'additionalParams' => [[self::UNIQUE_ID]],
                ],
            ],
            [
                $baseData + [
                    'methodName' => ResourceMethodEnum::UPDATE,
                    'endpointPath' => sprintf(RequestPathFormatEnum::CONTACTS_BY_ID, self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ],
            ],
        ];
    }
}
