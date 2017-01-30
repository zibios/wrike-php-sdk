<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Documents\Group;

use Zibios\WrikePhpSdk\Documents\Group\GroupResourceDocument;
use Zibios\WrikePhpSdk\Tests\Documents\ResourceDocumentTestCase;

/**
 * Group Resource Document Test
 */
class GroupResourceDocumentTest extends ResourceDocumentTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = GroupResourceDocument::class;

    /**
     * @var array
     */
    protected $properties = [
        'id',
        'accountId',
        'title',
        'memberIds',
        'childIds',
        'parentIds',
        'avatarUrl',
        'myTeam',
        'metadata',
    ];
}
