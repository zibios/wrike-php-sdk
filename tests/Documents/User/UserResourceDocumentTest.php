<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Documents\User;

use Zibios\WrikePhpSdk\Documents\User\UserResourceDocument;
use Zibios\WrikePhpSdk\Tests\Documents\ResourceDocumentTestCase;

/**
 * User Resource Document Test
 */
class UserResourceDocumentTest extends ResourceDocumentTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = UserResourceDocument::class;

    /**
     * @var array
     */
    protected $properties = [
        'id',
        'firstName',
        'lastName',
        'type',
        'profiles',
        'avatarUrl',
        'timezone',
        'locale',
        'deleted',
        'memberIds',
        'metadata',
        'myTeam',
        'title',
        'companyName',
        'phone',
        'location',
    ];
}
