<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Documents\Contact;

use JMS\Serializer\Annotation as SA;
use Zibios\WrikePhpSdk\Documents\ResponseDocumentAbstract;

/**
 * Contact Response Document
 */
class ContactResponseDocument extends ResponseDocumentAbstract
{
    /**
     * Collection of response documents
     *
     * @SA\Type("array<Zibios\WrikePhpSdk\Documents\Contact\ContactResourceDocument>")
     * @SA\SerializedName("data")
     * @var array|ContactResourceDocument[]|null
     */
    protected $data;
}
