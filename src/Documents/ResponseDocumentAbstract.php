<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Documents;

use JMS\Serializer\Annotation as SA;

/**
 * Response Document Abstract
 */
abstract class ResponseDocumentAbstract implements ResponseDocumentInterface
{
    /**
     * Kind of response
     *
     * @SA\Type("string")
     * @SA\SerializedName("kind")
     * @var string|null
     */
    protected $kind;

    /**
     * Collection of response documents
     *
     * @var array|ResourceDocumentInterface[]|null
     */
    protected $data;

    /**
     * @return null|string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param null|string $kind
     *
     * @return $this
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * @return array|null|ResourceDocumentInterface[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|null|ResourceDocumentInterface[] $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
