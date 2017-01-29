<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Enums;

use Zibios\WrikePhpSdk\Enums\RequestPathFormatEnum;

/**
 * Request Path Format Enum Test
 */
class RequestPathFormatEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $enumClass = RequestPathFormatEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 9;
}
