<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Exceptions\Api;

use Zibios\WrikePhpSdk\Exceptions\Api\InvalidParameterException;

/**
 * Invalid Parameter Exception Test
 */
class InvalidParameterExceptionTest extends ApiExceptionTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = InvalidParameterException::class;
}
