<?php
/**
 * This file is part of the WrikePhpSdk package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpSdk\Api\Configs;

use Zibios\WrikePhpSdk\Enums\ResponseClassEnum;

/**
 * Response Classes Config
 *
 * All Response classes list
 * @see ResponseClassEnum
 */
class ResponseClassesConfig
{
    /**
     * @var string
     */
    protected $contactResponseClass = ResponseClassEnum::CONTACT;

    /**
     * @var string
     */
    protected $userResponseClass = ResponseClassEnum::USER;

    /**
     * @var string
     */
    protected $groupResponseClass = ResponseClassEnum::GROUP;

    /**
     * @var string
     */
    protected $invitationResponseClass = ResponseClassEnum::INVITATION;

    /**
     * @return string
     */
    public function getContactResponseClass()
    {
        return $this->contactResponseClass;
    }

    /**
     * @param string $responseClass
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setContactResponseClass($responseClass)
    {
        return $this->setResponseClass('contactResponseClass', $responseClass);
    }

    /**
     * @return string
     */
    public function getUserResponseClass()
    {
        return $this->userResponseClass;
    }

    /**
     * @param string $responseClass
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setUserResponseClass($responseClass)
    {
        return $this->setResponseClass('userResponseClass', $responseClass);
    }

    /**
     * @return string
     */
    public function getGroupResponseClass()
    {
        return $this->groupResponseClass;
    }

    /**
     * @param string $responseClass
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setGroupResponseClass($responseClass)
    {
        return $this->setResponseClass('groupResponseClass', $responseClass);
    }

    /**
     * @return string
     */
    public function getInvitationResponseClass()
    {
        return $this->invitationResponseClass;
    }

    /**
     * @param string $responseClass
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setInvitationResponseClass($responseClass)
    {
        return $this->setResponseClass('invitationResponseClass', $responseClass);
    }

    /**
     * @param string $propertyName
     * @param string $responseClass
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    protected function setResponseClass($propertyName, $responseClass)
    {
        class_exists($responseClass);
        if (property_exists($this, $propertyName) === false) {
            throw new \InvalidArgumentException(sprintf('Property "%s" not exist!', $propertyName));
        }
        if (class_exists($responseClass) === false) {
            throw new \InvalidArgumentException(sprintf('Class "%s" not exist!', $responseClass));
        }
        $this->{$propertyName} = $responseClass;

        return $this;
    }
}
