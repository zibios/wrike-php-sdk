<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Documents\Components;

use JMS\Serializer\Annotation as SA;
use Zibios\WrikePhpSdk\Documents\ResourceDocumentAbstract;

/**
 * Metadata Document
 */
class MetadataDocument extends ResourceDocumentAbstract
{
    /**
     * Key should be less than 50 symbols and match following regular expression ([A-Za-z0-9_-]+)
     *
     * @SA\Type("string")
     * @SA\SerializedName("key")
     * @var string|null
     */
    protected $key;

    /**
     * Value should be less than 1000 symbols, compatible with JSON string.
     * Use JSON 'null' in order to remove metadata entry
     *
     * @SA\Type("string")
     * @SA\SerializedName("value")
     * @var string|null
     */
    protected $value;

    /**
     * @return null|string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param null|string $key
     *
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param null|string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
