<?php

/**
 * This file is part of the Ai User Bundle
 *
 * (c) 2011 Mark Brennand, ACTiVEiNGREDiENT
 * 
 */

namespace Ai\UserBundle\Entity;

use FOS\UserBundle\Entity\User as AbstractUser;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @orm:Entity(repositoryClass="Ai\UserBundle\Repository\UserRepository")
 * @orm:Table(name="Users")
 * @orm:HasLifecycleCallbacks
 */
class User extends AbstractUser
{
  # forward compatible
  const ROLE_DEFAULT     = 'ROLE_USER';
  const ROLE_SUPERADMIN  = 'ROLE_SUPER_ADMIN';
  const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
  
  /**
   * @orm:Id
   * @orm:Column(
   *    name="userId",
   *    type="integer"
   * )
   * @orm:generatedValue(strategy="AUTO")
   * 
   * @var integer $id
   */
  protected $id;
  
  /**
   * @orm:Column(
   *    name="username",
   *    type="string",
   *    length=100,
   *    unique=true,
   *    nullable=false
   * )
   * 
   * @var string $username
   */
  protected $username;

  /**
   * @orm:Column(
   *    name="usernameCanonical",
   *    type="string",
   *    length=100,
   *    unique=true,
   *    nullable=false
   * )
   * 
   * @var string $usernameCanonical
   */
  protected $usernameCanonical;

  /**
   * @orm:Column(
   *    name="email",
   *    type="string",
   *    length=100,
   *    unique=true,
   *    nullable=false
   * )
   * 
   * @var string $email
   */
  protected $email;

  /**
   * @orm:Column(
   *    name="emailCanonical",
   *    type="string",
   *    length=100,
   *    unique=true,
   *    nullable=false
   * )
   * 
   * @var string $emailCanonical
   */
  protected $emailCanonical;

  /**
   * @orm:Column(
   *    name="enabled",
   *    type="boolean"
   * )
   * 
   * @var boolean $enabled
   */
  protected $enabled;

  /**
   * The algorithm to use for hashing
   *
   * @orm:Column(
   *    name="algorithm",
   *    type="string",
   *    length=255,
   *    nullable=false
   * )
   * 
   * @var string $algorithm
   */
  protected $algorithm;

  /**
   * The salt to use for hashing
   *
   * @orm:Column(
   *    name="salt",
   *    type="string",
   *    length=255,
   *    nullable=false
   * )
   * 
   * @var string $salt
   */
  protected $salt;

  /**
   * Encrypted password. Must be persisted.
   *
   * @orm:Column(
   *    name="password",
   *    type="string",
   *    length=255,
   *    nullable=false
   * )
   * 
   * @var string $password
   */
  protected $password;

  /**
   * @orm:Column(
   *    name="updatedDateTime",
   *    type="datetime",
   *    nullable=false
   * )
   * 
   * @var \DateTime $updatedAt
   */
  protected $updatedAt;

  /**
   * @orm:Column(
   *    name="lastLoginDateTime",
   *    type="datetime",
   *    nullable=true
   * )
   * 
   * @var \DateTime $lastLogin
   */
  protected $lastLogin;

  /**
   * Random string sent to the user email address in order to verify it
   *
   * @orm:Column(
   *    name="confirmationToken",
   *    type="string",
   *    length=255,
   *    nullable=true
   * )
   * 
   * @var string $confirmationToken
   */
  protected $confirmationToken;

  /**
   * @orm:Column(
   *    name="passwordRequestedDateTime",
   *    type="datetime",
   *    nullable=true
   * )
   * 
   * @var \DateTime $passwordRequestedAt
   */
  protected $passwordRequestedAt;

  /**
   * @orm:Column(
   *    name="locked",
   *    type="boolean"
   * )
   * 
   * @var boolean $locked
   */
  protected $locked;

  /**
   * @orm:Column(
   *    name="expired",
   *    type="boolean"
   * )
   * 
   * @var boolean $expired
   */
  protected $expired;

  /**
   * @orm:Column(
   *    name="expiresDateTime",
   *    type="datetime",
   *    nullable=true
   * )
   * 
   * @var DateTime $expiresAt
   */
  protected $expiresAt;

  /**
   * @orm:Column(
   *    name="credentialsExpired",
   *    type="boolean"
   * )
   * 
   * @var boolean $credentialsExpired
   */
  protected $credentialsExpired;

  /**
   * @orm:Column(
   *    name="credentialsExpireDateTime",
   *    type="datetime",
   *    nullable=true
   * )
   * 
   * @var DateTime $credentialsExpireAt
   */
  protected $credentialsExpireAt;
  
  /**
   * @orm:Column(
   *    name="firstName",
   *    type="string",
   *    length=100,
   *    nullable=true
   * )
   *
   * @var string $firstName
   */
  protected $firstName;
  
  /**
   * @orm:Column(
   *    name="lastName",
   *    type="string",
   *    length=100,
   *    nullable=true
   * )
   *
   * @var string $lastName
   */
  protected $lastName;
  
  /**
   * @orm:Column(
   *    name="phone",
   *    type="string",
   *    length=20,
   *    nullable=true
   * )
   *
   * @var string $phone
   */
  protected $phone;
  
  /**
   * @orm:Column(
   *    name="mobile",
   *    type="string",
   *    length=20,
   *    nullable=true
   * )
   *
   * @var string $mobile
   */
  protected $mobile;
  
  /**
   * @orm:ManyToMany(targetEntity="Role")
   * @orm:JoinTable(
   *    name="UsersRoles",
   *    joinColumns={@orm:JoinColumn(name="userId",referencedColumnName="id")},
   *    inverseJoinColumns={@orm:JoinColumn(name="roleId",referencedColumnName="id")}
   * )
   *
   * @var ArrayCollection $roles
   */
  protected $roles;
  
  /**
   * @orm:OneToMany(
   *    targetEntity="UserPreference",
   *    inversedBy="user"
   * )
   */
  protected $userPreferences;
  
  /**
   * @orm:ManyToOne(
   *    targetEntity="Organisation",
   *    inversedBy="users"
   * )
   * @orm:JoinColumn(
   *    name="organisationId",
   *    referencedColumnName="id"
   * )
   */
  protected $organisation;
  
  /**
   * @orm:ManyToMany(targetEntity="Organisation")
   * @orm:JoinTable(
   *    name="UsersOrganisations",
   *    joinColumns={@orm:JoinColumn(name="userId",referencedColumnName="id")},
   *    inverseJoinColumns={@orm:JoinColumn(name="organisationId",referencedColumnName="id")}
   * )
   *
   * @var ArrayCollection $associatedOrganisations
   */
  protected $associatedOrganisations;
  
  public function __construct()
  {
    parent::__construct();
    
    # switch out default array implementation
    $this->roles = new ArrayCollection();
  }
  
  /**
   * ID wrapper
   *
   * @return id $id
   */
  public function getUserId()
  {
    return $this->id;
  }
  
  /**
   * Add a role to the list of roles
   */ 
  public function addRole($role)
  {
    $role = strtoupper($role);
    if($role === self::ROLE_DEFAULT)
    {
      return;
    }
    
    if(!$this->roles->contains($role))
    {
      $this->roles->add($role);
    }
  }
  
  /**
   * @orm:PrePersist
   */
  public function incrementCreatedAt()
  {
    parent::incrementCreatedAt();
  }
  
  /**
   * @orm:PreUpdate
   */
  public function incrementUpdatedAt()
  {
    parent::incrementUpdatedAt();
  }
  
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
  }
  
  public function getFirstName()
  {
    return $this->firstName;
  }
  
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  
  public function getLastName()
  {
    return $this->lastName;
  }
  
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }
  
  public function getPhone()
  {
    return $this->phone;
  }
  
  public function setMobile($mobile)
  {
    $this->mobile = $mobile;
  }
  
  public function getMobile()
  {
    return $this->mobile;
  }
 
  /**
   * Sets the users collection.
   *
   * @param ArrayCollection $value The users.
   */
  public function setRoles($value)
  {
    $this->roles = $roles;
  }
  
  /**
   * Gets an array of roles.
   * 
   * @return ArrayCollection $roles
   */
  public function getRoles()
  {
    return $this->roles;
  }
  
  /**
   * Sets the user's primary organisation
   *
   * @param Ai\UserBundle\Entity\Organisation $value The organisation.
   */
  public function setOrganisation($value)
  {
    $this->organisation = $value;
  }
  
  /**
   * Gets the user's primary organisation.
   * 
   * @return Ai\UserBundle\Entity\Organisation $organisation
   */
  public function getOrganisation()
  {
    return $this->organisation;
  }
  
  /**
   * Sets the user's associated organisations.
   *
   * @param ArrayCollection $value The associated organisations.
   */
  public function setAssociatedOrganisations($value)
  {
    $this->associatedOrganisations = $value;
  }
  
  /**
   * Gets the user's associated organisations.
   * 
   * @return ArrayCollection $associatedOrganisations
   */
  public function getAssociatedOrganisations()
  {
    return $this->associatedOrganisations;
  }
  
  /**
   * Add an organisation to the list of associated organisations
   */ 
  public function addAssociatedOrganisation($organisation)
  {
    if(!$this->associatedOrganisations->contains($organisation))
    {
      $this->associatedOrganisations->add($organisation);
    }
  }
  
  /**
   * Sets the user's preferences.
   *
   * @param ArrayCollection $value The user preferences.
   */
  public function setUserPreferences($value)
  {
    $this->userPreferences = $value;
  }
  
  /**
   * Gets the user's preferences.
   * 
   * @return ArrayCollection $userPreferences
   */
  public function getUserPreferences()
  {
    return $this->userPreferences;
  }
  
  /**
   * Add a preference to the list of user preferences
   */ 
  public function addUserPreference($userPreference)
  {
    if(!$this->userPreferences->contains($userPreference))
    {
      $this->userPreferences->add($userPreference);
    }
  }
}