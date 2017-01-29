<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Tests\Documents;

use Zibios\WrikePhpSdk\Documents\ResponseDocumentAbstract;
use Zibios\WrikePhpSdk\Documents\ResponseDocumentInterface;
use Zibios\WrikePhpSdk\Tests\TestCase;

/**
 * Response Document Test Case
 */
abstract class ResponseDocumentTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $sourceClass;

    /**
     * @var ResponseDocumentInterface
     */
    protected $document;

    /**
     * @var array
     */
    protected $properties = [
        'kind',
        'data',
    ];

    /**
     * Sets up the exception.
     */
    public function setUp()
    {
        $this->document = new $this->sourceClass();
    }

    /**
     * Test exception inheritance
     */
    public function test_ResourceDocument_ExtendProperClasses()
    {
        self::assertInstanceOf(ResponseDocumentAbstract::class, $this->document, sprintf('"%s" should extend "%s"', get_class($this->document), ResponseDocumentAbstract::class));
        self::assertInstanceOf(ResponseDocumentInterface::class, $this->document, sprintf('"%s" should extend "%s"', get_class($this->document), ResponseDocumentInterface::class));
    }

    /**
     * Test properties methods
     */
    public function test_properPropertiesMethods()
    {
        foreach ($this->properties as $propertyName) {
            $getter = sprintf('get%s', ucwords($propertyName));
            self::assertTrue(method_exists($this->document, $getter), sprintf('"%s" not exist for "%s"', $getter, $this->sourceClass));
            $setter = sprintf('set%s', ucwords($propertyName));
            self::assertTrue(method_exists($this->document, $setter), sprintf('"%s" not exist for "%s"', $setter, $this->sourceClass));
        }
    }
}
