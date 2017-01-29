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
 * Response Mode Enum
 */
class ResponseModeEnum extends EnumAbstract
{
    const RESPONSE_RAW = 'RESPONSE_RAW';
    const BODY_STRING = 'BODY_STRING';
    const BODY_OBJECT = 'BODY_OBJECT';
    const BODY_DOCUMENT = 'BODY_DOCUMENT';
    const DOCUMENT = 'DOCUMENT';
}
