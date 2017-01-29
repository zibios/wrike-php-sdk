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

use Exception;
use Zibios\WrikePhpSdk\Exceptions\Api\ApiException;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Api Exception Test Case
 */
abstract class ApiExceptionTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $sourceClass;

    /**
     * @var ApiException
     */
    protected $exception;

    /**
     * Sets up the exception.
     */
    public function setUp()
    {
        $this->exception = new $this->sourceClass(new \Exception());
    }

    /**
     * Test exception inheritance
     */
    public function test_ExceptionExtendProperClasses()
    {
        self::assertInstanceOf(Exception::class, $this->exception, sprintf('"%s" should extend "%s"', get_class($this->exception), Exception::class));
        self::assertInstanceOf(ApiException::class, $this->exception, sprintf('"%s" should extend "%s"', get_class($this->exception), ApiException::class));
        self::assertInstanceOf($this->sourceClass, $this->exception, sprintf('"%s" should extend "%s"', get_class($this->exception), $this->sourceClass));
    }
}
