<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Documents\Invitation;

use Zibios\WrikePhpSdk\Documents\Invitation\InvitationResourceDocument;
use Zibios\WrikePhpSdk\Tests\Documents\ResourceDocumentTestCase;

/**
 * Invitation Resource Document Test
 */
class InvitationResourceDocumentTest extends ResourceDocumentTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = InvitationResourceDocument::class;

    /**
     * @var array
     */
    protected $properties = [
        'id',
        'accountId',
        'firstName',
        'lastName',
        'email',
        'status',
        'inviterUserId',
        'invitationDate',
        'resolvedDate',
        'role',
        'external',
    ];
}
