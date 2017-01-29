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

use Zibios\WrikePhpSdk\Enums\EnumAbstract;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Enum Test Case
 */
abstract class EnumTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $enumClass;

    /**
     * @var int
     */
    protected $enumCount;

    /**
     * @var EnumAbstract
     */
    protected $enum;

    /**
     * Sets up the exception.
     */
    public function setUp()
    {
        $this->enum = new $this->enumClass();
    }

    /**
     * Test enum inheritance
     */
    public function test_EnumExtendProperClasses()
    {
        self::assertInstanceOf(EnumAbstract::class, $this->enum, sprintf('"%s" should extend "%s"', get_class($this->enum), EnumAbstract::class));
        self::assertInstanceOf($this->enumClass, $this->enum, sprintf('"%s" should extend "%s"', get_class($this->enum), $this->enumClass));
    }

    public function test_toArray()
    {
        $enums = call_user_func([$this->enumClass, 'toArray']);
        self::assertInternalType('array', $enums);
        self::assertCount($this->enumCount, $enums, $this->enumClass);
    }

    public function test_getKeys()
    {
        $enums = call_user_func([$this->enumClass, 'toArray']);
        $keys = call_user_func([$this->enumClass, 'getKeys']);
        self::assertInternalType('array', $keys);
        self::assertSame(array_keys($enums), $keys);
    }

    public function test_getValues()
    {
        $enums = call_user_func([$this->enumClass, 'toArray']);
        $values = call_user_func([$this->enumClass, 'getValues']);
        self::assertInternalType('array', $values);
        self::assertSame(array_values($enums), $values);
    }

    /**
     * @return array
     */
    public function enumKeysProvider()
    {
        $keys = call_user_func([$this->enumClass, 'getKeys']);

        return [
            // [key, isValid]
            [$keys[0], true],
            ['NotExistedEnumKey', false],
            ['', false],
            [null, false],
        ];
    }

    /**
     * @param mixed $key
     * @param boolean $isValid
     *
     * @dataProvider enumKeysProvider
     */
    public function test_isValidKey_assertIsValidKey($key, $isValid)
    {
        self::assertEquals($isValid, call_user_func([$this->enumClass, 'isValidKey'], $key));
        $e = null;
        $exceptionOccurred = false;
        try {
            call_user_func([$this->enumClass, 'assertIsValidKey'], $key);
        } catch (\Exception $e) {
            $exceptionOccurred = true;
        }

        if ($isValid === true) {
            self::assertFalse($exceptionOccurred, sprintf('assertIsValidKey should not throw exception but "%s" exception occurred!', get_class($e)));
        }
        if ($isValid === false) {
            self::assertTrue($exceptionOccurred, sprintf('assertIsValidKey should throw exception but exception not occurred!'));
            self::assertInstanceOf(\InvalidArgumentException::class, $e, sprintf('assertIsValidKey should throw %s exception but %s exception occurred!', \InvalidArgumentException::class, get_class($e)));
        }
    }

    /**
     * @return array
     */
    public function enumValuesProvider()
    {
        $values = call_user_func([$this->enumClass, 'getValues']);

        return [
            // [value, isValid]
            [$values[0], true],
            ['NotExistedEnumValue', false],
            ['', false],
            [null, false],
        ];
    }

    /**
     * @param mixed $value
     * @param boolean $isValid
     *
     * @dataProvider enumValuesProvider
     */
    public function test_isValidValue_assertIsValidValue($value, $isValid)
    {
        self::assertEquals($isValid, call_user_func([$this->enumClass, 'isValidValue'], $value));
        $e = null;
        $exceptionOccurred = false;
        try {
            call_user_func([$this->enumClass, 'assertIsValidValue'], $value);
        } catch (\Exception $e) {
            $exceptionOccurred = true;
        }

        if ($isValid === true) {
            self::assertFalse($exceptionOccurred, sprintf('assertIsValidValue should not throw exception but "%s" exception occurred!', get_class($e)));
        }
        if ($isValid === false) {
            self::assertTrue($exceptionOccurred, sprintf('assertIsValidValue should throw exception but exception not occurred!'));
            self::assertInstanceOf(\InvalidArgumentException::class, $e, sprintf('assertIsValidValue should throw %s exception but %s exception occurred!', \InvalidArgumentException::class, get_class($e)));
        }
    }
}
