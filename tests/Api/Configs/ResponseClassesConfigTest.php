<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Api\Configs;

use Zibios\WrikePhpSdk\Api\Configs\ResponseClassesConfig;
use Zibios\WrikePhpSdk\Enums\ResponseClassEnum;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Response Classes Config Test
 */
class ResponseClassesConfigTest extends TestCase
{

    /**
     * @var ResponseClassesConfig
     */
    protected $config;

    /**
     * Sets up the ResponseClassesConfig.
     */
    public function setUp()
    {
        $this->config = new ResponseClassesConfig();
    }

    /**
     * Test exception inheritance
     */
    public function test_ExtendProperClasses()
    {
        self::assertInstanceOf(ResponseClassesConfig::class, $this->config);
    }

    /**
     * @return array
     */
    public function propertiesProvider()
    {
        return [
            ['contactResponseClass', ResponseClassEnum::CONTACT],
            ['userResponseClass', ResponseClassEnum::USER],
            ['groupResponseClass', ResponseClassEnum::GROUP],
            ['invitationResponseClass', ResponseClassEnum::INVITATION],
        ];
    }

    /**
     * @param string $propertyResponseClass
     * @param string $baseResponseClass
     *
     * @dataProvider propertiesProvider
     */
    public function test_getSetMethods($propertyResponseClass, $baseResponseClass)
    {
        $testClass = \stdClass::class;

        $getter = sprintf('get%s', ucwords($propertyResponseClass));
        self::assertTrue(method_exists($this->config, $getter), sprintf('"%s" not exist for "%s"', $getter, ResponseClassesConfig::class));
        self::assertSame($baseResponseClass, $this->config->{$getter}());

        $setter = sprintf('set%s', ucwords($propertyResponseClass));
        self::assertTrue(method_exists($this->config, $setter), sprintf('"%s" not exist for "%s"', $setter, ResponseClassesConfig::class));
        self::assertInstanceOf(ResponseClassesConfig::class, $this->config->{$setter}($testClass));
        self::assertSame($testClass, $this->config->{$getter}());
        self::assertNotSame($baseResponseClass, $this->config->{$getter}());

        $wrongClass = 'NotExistingClass';
        $exceptionOccurred = false;
        $e = null;
        try {
            $this->config->{$setter}($wrongClass);
        } catch (\Exception $e) {
            $exceptionOccurred = true;
        }
        self::assertTrue($exceptionOccurred, sprintf('Exception should be throw for "%s"', $wrongClass));
        self::assertInstanceOf(\InvalidArgumentException::class, $e, sprintf('Exception "%s" should be throw for "%s"', \InvalidArgumentException::class, $wrongClass));
    }
}
