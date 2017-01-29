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
use Zibios\WrikePhpSdk\Documents\ResourceDocumentAbstract;

/**
 * Invitation Resource Document
 */
class InvitationResourceDocument extends ResourceDocumentAbstract
{
    /**
     * Invitation ID
     *
     * Comment: Invitation ID
     *
     * @SA\Type("string")
     * @SA\SerializedName("id")
     * @var string|null
     */
    protected $id;

    /**
     * Account ID
     *
     * Comment: Account ID
     *
     * @SA\Type("string")
     * @SA\SerializedName("accountId")
     * @var string|null
     */
    protected $accountId;

    /**
     * First name
     *
     * @SA\Type("string")
     * @SA\SerializedName("firstName")
     * @var string|null
     */
    protected $firstName;

    /**
     * Last name
     *
     * @SA\Type("string")
     * @SA\SerializedName("lastName")
     * @var string|null
     */
    protected $lastName;

    /**
     * Invitation Title
     *
     * @SA\Type("Email")
     * @SA\SerializedName("email")
     * @var string|null
     */
    protected $email;

    /**
     * Status
     *
     * Invitation status
     * Enum: Pending, Accepted, Declined, Cancelled
     * @see \Zibios\WrikePhpSdk\Enums\InvitationStatusEnum
     *
     * @SA\Type("string")
     * @SA\SerializedName("status")
     * @var string|null
     */
    protected $status;

    /**
     * Inviter Contact ID
     *
     * Comment: Contact ID
     *
     * @SA\Type("string")
     * @SA\SerializedName("inviterUserId")
     * @var string|null
     */
    protected $inviterUserId;

    /**
     * Date when invitation was created
     *
     * Format: yyyy-MM-dd'T'HH:mm:ss'Z'
     *
     * @SA\Type("DateTime<'Y-m-d\TH:i:s\Z'>")
     * @SA\SerializedName("invitationDate")
     * @var string|null
     */
    protected $invitationDate;

    /**
     * Date when the invitation was resolved
     *
     * Format: yyyy-MM-dd'T'HH:mm:ss'Z'
     * Comment: Optional
     *
     * @SA\Type("DateTime<'Y-m-d\TH:i:s\Z'>")
     * @SA\SerializedName("resolvedDate")
     * @var string|null
     */
    protected $resolvedDate;

    /**
     * Invited user role
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
     * @return null|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param null|string $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param null|string $lastName
     *
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param null|string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getInviterUserId()
    {
        return $this->inviterUserId;
    }

    /**
     * @param null|string $inviterUserId
     *
     * @return $this
     */
    public function setInviterUserId($inviterUserId)
    {
        $this->inviterUserId = $inviterUserId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getInvitationDate()
    {
        return $this->invitationDate;
    }

    /**
     * @param null|string $invitationDate
     *
     * @return $this
     */
    public function setInvitationDate($invitationDate)
    {
        $this->invitationDate = $invitationDate;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getResolvedDate()
    {
        return $this->resolvedDate;
    }

    /**
     * @param null|string $resolvedDate
     *
     * @return $this
     */
    public function setResolvedDate($resolvedDate)
    {
        $this->resolvedDate = $resolvedDate;

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
}
