<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Enums;

use Zibios\WrikePhpSdk\Documents\Contact\ContactResponseDocument;
use Zibios\WrikePhpSdk\Documents\Group\GroupResponseDocument;
use Zibios\WrikePhpSdk\Documents\Invitation\InvitationResponseDocument;
use Zibios\WrikePhpSdk\Documents\User\UserResponseDocument;

/**
 * Response Class Enum
 */
class ResponseClassEnum extends EnumAbstract
{
    const CONTACT = ContactResponseDocument::class;
    const USER = UserResponseDocument::class;
    const GROUP = GroupResponseDocument::class;
    const INVITATION = InvitationResponseDocument::class;
}
