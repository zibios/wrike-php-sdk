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
 * Resource Method Enum
 */
class ResourceMethodEnum extends EnumAbstract
{
    const GET_ALL = 'getAll';
    const GET_ALL_IN_ACCOUNT = 'getAllInAccount';
    const GET_BY_ID = 'getById';
    const GET_BY_IDS = 'getByIds';
    const CREATE_IN_ACCOUNT = 'createInAccount';
    const UPDATE = 'update';
    const DELETE = 'delete';
}
