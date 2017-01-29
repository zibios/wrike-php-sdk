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

/**
 * Invitation Status Enum
 */
class InvitationStatusEnum extends EnumAbstract
{
    const PENDING = 'Pending';
    const ACCEPTED = 'Accepted';
    const DECLINED = 'Declined';
    const CANCELLED = 'Cancelled';
}
