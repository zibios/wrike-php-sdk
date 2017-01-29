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
 * User Profile Document
 */
class UserProfileDocument extends ResourceDocumentAbstract
{
    /**
     * Account ID
     *
     * @SA\Type("string")
     * @SA\SerializedName("accountId")
     * @var string|null
     */
    protected $accountId;

    /**
     * Email address associated with account
     *
     * @SA\Type("string")
     * @SA\SerializedName("email")
     * @var string|null
     */
    protected $email;

    /**
     * Role in account
     *
     * Enum: User, Collaborator
     * @see \Zibios\WrikePhpSdk\Enums\UserRoleEnum
     *
     * @SA\Type("string")
     * @SA\SerializedName("role")
     * @var string|null
     */
    protected $role;

    /**
     * Is user external
     *
     * @SA\Type("boolean")
     * @SA\SerializedName("external")
     * @var bool|null
     */
    protected $external;

    /**
     * Is user account admin
     *
     * @SA\Type("boolean")
     * @SA\SerializedName("admin")
     * @var bool|null
     */
    protected $admin;

    /**
     * Is user account owner
     *
     * @SA\Type("boolean")
     * @SA\SerializedName("owner")
     * @var bool|null
     */
    protected $owner;

    /**
     * @return null|string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param null|string $accountId
     *
     * @return $this
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param null|string $role
     *
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getExternal()
    {
        return $this->external;
    }

    /**
     * @param bool|null $external
     *
     * @return $this
     */
    public function setExternal($external)
    {
        $this->external = $external;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param bool|null $admin
     *
     * @return $this
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param bool|null $owner
     *
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }
}
