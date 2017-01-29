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
 * User Type Enum
 */
class UserTypeEnum extends EnumAbstract
{
    /**
     * Person
     *
     * Single person.
     */
    const PERSON = 'Person';

    /**
     * Group of users.
     *
     * Group userId can be used in folder/task sharing requests only. It has no effect in other operations
     */
    const GROUP = 'Group';
}
