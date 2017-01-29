<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Documents\Invitation;

use JMS\Serializer\Annotation as SA;
use Zibios\WrikePhpSdk\Documents\ResponseDocumentAbstract;

/**
 * Invitation Response Document
 */
class InvitationResponseDocument extends ResponseDocumentAbstract
{
    /**
     * Collection of response documents
     *
     * @SA\Type("array<Zibios\WrikePhpSdk\Documents\Invitation\InvitationResourceDocument>")
     * @SA\SerializedName("data")
     * @var array|InvitationResourceDocument[]|null
     */
    protected $data;
}
