<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Documents\User;

use JMS\Serializer\Annotation as SA;
use Zibios\WrikePhpSdk\Documents\ResponseDocumentAbstract;

/**
 * User Response Document
 */
class UserResponseDocument extends ResponseDocumentAbstract
{
    /**
     * @SA\Type("array<Zibios\WrikePhpSdk\Documents\User\UserResourceDocument>")
     * @SA\SerializedName("data")
     * @var array|UserResourceDocument[]|null
     */
    protected $data;
}
