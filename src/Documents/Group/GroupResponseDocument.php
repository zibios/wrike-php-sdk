<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Documents\Group;

use JMS\Serializer\Annotation as SA;
use Zibios\WrikePhpSdk\Documents\ResponseDocumentAbstract;

/**
 * Group Response Document
 */
class GroupResponseDocument extends ResponseDocumentAbstract
{
    /**
     * Collection of response documents
     *
     * @SA\Type("array<Zibios\WrikePhpSdk\Documents\Group\GroupResourceDocument>")
     * @SA\SerializedName("data")
     * @var array|GroupResourceDocument[]|null
     */
    protected $data;
}
