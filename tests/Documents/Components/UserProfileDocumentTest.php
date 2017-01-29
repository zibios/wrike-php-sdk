<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Documents\Components;

use Zibios\WrikePhpSdk\Documents\Components\UserProfileDocument;
use Zibios\WrikePhpSdk\Tests\Documents\ResourceDocumentTestCase;

/**
 * User Profile Document Test
 */
class UserProfileDocumentTest extends ResourceDocumentTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = UserProfileDocument::class;

    /**
     * @var array
     */
    protected $properties = [
        'accountId',
        'email',
        'role',
        'external',
        'admin',
        'owner',
    ];
}
