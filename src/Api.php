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
 * General Wrike Api
 *
 * Entry point for all Wrike API operations.
 */
class Api implements ApiInterface
{
    /**
     * @var ContactResource
     */
    protected $contactResource;

    /**
     * @var UserResource
     */
    protected $userResource;

    /**
     * @var GroupResource
     */
    protected $groupResource;

    /**
     * @var InvitationResource
     */
    protected $invitationResource;

    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @return ConfigInterface
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param ConfigInterface $config
     *
     * @return $this
     */
    public function setConfig(ConfigInterface $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @return ContactResource
     */
    public function getContactResource()
    {
        if ($this->contactResource === null) {
            $this->contactResource = new ContactResource($this->config);
        }

        return $this->contactResource;
    }

    /**
     * @return UserResource
     */
    public function getUserResource()
    {
        if ($this->userResource === null) {
            $this->userResource = new UserResource($this->config);
        }

        return $this->userResource;
    }

    /**
     * @return GroupResource
     */
    public function getGroupResource()
    {
        if ($this->groupResource === null) {
            $this->groupResource = new GroupResource($this->config);
        }

        return $this->groupResource;
    }

    /**
     * @return InvitationResource
     */
    public function getInvitationResource()
    {
        if ($this->invitationResource === null) {
            $this->invitationResource = new InvitationResource($this->config);
        }

        return $this->invitationResource;
    }
}
