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
use Zibios\WrikePhpSdk\Documents\Components\MetadataDocument;
use Zibios\WrikePhpSdk\Documents\Components\UserProfileDocument;
use Zibios\WrikePhpSdk\Documents\ResourceDocumentAbstract;

/**
 * Contact Resource Document
 */
class ContactResourceDocument extends ResourceDocumentAbstract
{
    /**
     * Contact ID
     *
     * Comment: Contact ID
     *
     * @SA\Type("string")
     * @SA\SerializedName("id")
     * @var string|null
     */
    protected $id;

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
     * Type of the user
     *
     * Enum: Person, Group
     * @see \Zibios\WrikePhpSdk\Enums\UserTypeEnum
     *
     * @SA\Type("string")
     * @SA\SerializedName("type")
     * @var string|null
     */
    protected $type;

    /**
     * List of user profiles in accounts accessible for requesting user
     *
     * @SA\Type("array<Zibios\WrikePhpSdk\Api\Documents\Components\UserProfileDocument>")
     * @SA\SerializedName("profiles")
     * @var array|UserProfileDocument[]|null
     */
    protected $profiles;

    /**
     * Avatar URL
     *
     * @SA\Type("string")
     * @SA\SerializedName("avatarUrl")
     * @var string|null
     */
    protected $avatarUrl;

    /**
     * Timezone Id, e.g 'America/New_York'
     *
     * @SA\Type("string")
     * @SA\SerializedName("timezone")
     * @var string|null
     */
    protected $timezone;

    /**
     * Locale
     *
     * @SA\Type("string")
     * @SA\SerializedName("locale")
     * @var string|null
     */
    protected $locale;

    /**
     * True if user is deleted, false otherwise
     *
     * @SA\Type("boolean")
     * @SA\SerializedName("deleted")
     * @var bool|null
     */
    protected $deleted;

    /**
     * Field is present and set to true only for requesting user
     *
     * @SA\Type("boolean")
     * @SA\SerializedName("me")
     * @var bool|null
     */
    protected $me;

    /**
     * List of group members contact IDs (field is present only for groups)
     *
     * Comment: Contact ID array
     *
     * @SA\Type("array<string>")
     * @SA\SerializedName("memberIds")
     * @var array|string[]|null
     */
    protected $memberIds;

    /**
     * List of contact metadata entries.
     *
     * Requesting user has read/write access to his own metadata, other entries are read-only
     * Metadata entry key-value pair
     * Metadata entries are isolated on per-client (application) basis
     * Comment: Optional
     *
     * @SA\Type("array<Zibios\WrikePhpSdk\Api\Documents\Components\MetadataDocument>")
     * @SA\SerializedName("metadata")
     * @var array|MetadataDocument[]|null
     */
    protected $metadata;

    /**
     * Field is present and set to true for My Team (default) group
     *
     * Comment: Optional
     *
     * @SA\Type("boolean")
     * @SA\SerializedName("myTeam")
     * @var bool|null
     */
    protected $myTeam;

    /**
     * User Title
     *
     * Comment: Optional
     *
     * @SA\Type("string")
     * @SA\SerializedName("title")
     * @var string|null
     */
    protected $title;

    /**
     * User Company Name
     *
     * Comment: Optional
     *
     * @SA\Type("string")
     * @SA\SerializedName("companyName")
     * @var string|null
     */
    protected $companyName;

    /**
     * User phone
     *
     * Comment: Optional
     *
     * @SA\Type("string")
     * @SA\SerializedName("phone")
     * @var string|null
     */
    protected $phone;

    /**
     * User location
     *
     * Comment: Optional
     *
     * @SA\Type("string")
     * @SA\SerializedName("location")
     * @var string|null
     */
    protected $location;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array|null|UserProfileDocument[]
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * @param array|null|UserProfileDocument[] $profiles
     *
     * @return $this
     */
    public function setProfiles($profiles)
    {
        $this->profiles = $profiles;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @param null|string $avatarUrl
     *
     * @return $this
     */
    public function setAvatarUrl($avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param null|string $timezone
     *
     * @return $this
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param null|string $locale
     *
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param bool|null $deleted
     *
     * @return $this
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMe()
    {
        return $this->me;
    }

    /**
     * @param bool|null $me
     *
     * @return $this
     */
    public function setMe($me)
    {
        $this->me = $me;

        return $this;
    }

    /**
     * @return array|null|string[]
     */
    public function getMemberIds()
    {
        return $this->memberIds;
    }

    /**
     * @param array|null|string[] $memberIds
     *
     * @return $this
     */
    public function setMemberIds($memberIds)
    {
        $this->memberIds = $memberIds;

        return $this;
    }

    /**
     * @return array|null|MetadataDocument[]
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array|null|MetadataDocument[] $metadata
     *
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMyTeam()
    {
        return $this->myTeam;
    }

    /**
     * @param bool|null $myTeam
     *
     * @return $this
     */
    public function setMyTeam($myTeam)
    {
        $this->myTeam = $myTeam;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param null|string $companyName
     *
     * @return $this
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param null|string $location
     *
     * @return $this
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }
}
