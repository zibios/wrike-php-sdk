<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk;

use Zibios\WrikePhpSdk\Api\ConfigInterface;
use Zibios\WrikePhpSdk\Api\Resources\ContactResource;
use Zibios\WrikePhpSdk\Api\Resources\GroupResource;
use Zibios\WrikePhpSdk\Api\Resources\InvitationResource;
use Zibios\WrikePhpSdk\Api\Resources\UserResource;

/**
 * General Wrike Api Interface
 */
interface ApiInterface
{
    /**
     * @return ConfigInterface
     */
    public function getConfig();

    /**
     * @param ConfigInterface $config
     *
     * @return $this
     */
    public function setConfig(ConfigInterface $config);

    /**
     * @return ContactResource
     */
    public function getContactResource();

    /**
     * @return UserResource
     */
    public function getUserResource();

    /**
     * @return GroupResource
     */
    public function getGroupResource();

    /**
     * @return InvitationResource
     */
    public function getInvitationResource();
}
