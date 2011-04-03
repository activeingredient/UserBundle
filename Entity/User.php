<?php

/**
 * This file is part of the Ai User Bundle
 *
 * (c) 2011 Mark Brennand, ACTiVEiNGREDiENT
 * 
 */

namespace Ai\UserBundle\Entity;

use FOS\UserBundle\Entity\User as AbstractUser;

/**
 * @orm:Entity(repositoryClass="Ai\UserBundle\Repository\UserRepository")
 * @orm:Table(name="Users")
 */
class User extends AbstractUser
{
  # forward compatible
  const ROLE_DEFAULT     = 'ROLE_USER';
  const ROLE_SUPERADMIN  = 'ROLE_SUPER_ADMIN';
  const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
  
  /**
   * @orm:Id
   * @orm:Column(type="integer")
   * @orm:generatedValue(strategy="AUTO")
   * @var integer
   */
  protected $userId;
  
  /**
   * @orm:Column(name="username",type="string",length=100,unique=true,nullable=false)
   * @var string
   */
  protected $username;

  /**
   * @orm:Column(name="usernameCanonical",type="string",length=100,unique=true,nullable=false)
   * @var string
   */
  protected $usernameCanonical;

  /**
   * @orm:Column(name="email",type="string",length=100,unique=true,nullable=false)
   * @var string
   */
  protected $email;

  /**
   * @orm:Column(name="emailCanonical",type="string",length=100,unique=true,nullable=false)
   * @var string
   */
  protected $emailCanonical;

  /**
   * @orm:Column(name="enabled",type="boolean")
   * @var boolean
   */
  protected $enabled;

  /**
   * The algorithm to use for hashing
   *
   * @orm:Column(name="algorithm",type="string",length=255,nullable=false)
   * @var string
   */
  protected $algorithm;

  /**
   * The salt to use for hashing
   *
   * @orm:Column(name="salt",type="string",length=255,nullable=false)
   * @var string
   */
  protected $salt;

  /**
   * Encrypted password. Must be persisted.
   *
   * @orm:Column(name="password",type="string",length=255,nullable=false)
   * @var string
   */
  protected $password;

  /**
   * @orm:Column(name="createdDateTime",type="datetime",nullable=false)
   * @var \DateTime
   */
  protected $createdAt;

  /**
   * @orm:Column(name="updatedDateTime",type="datetime",nullable=false)
   * @var \DateTime
   */
  protected $updatedAt;

  /**
   * @orm:Column(name="lastLoginDateTime",type="datetime",nullable=true)
   * @var \DateTime
   */
  protected $lastLogin;

  /**
   * Random string sent to the user email address in order to verify it
   *
   * @orm:Column(name="confirmationToken",type="string",length=255,nullable=true)
   * @var string
   */
  protected $confirmationToken;

  /**
   * @orm:Column(name="passwordRequestedDateTime",type="datetime",nullable=true)
   * @var \DateTime
   */
  protected $passwordRequestedAt;

  /**
   * @orm:Column(name="locked",type="boolean")
   * @var boolean
   */
  protected $locked;

  /**
   * @orm:Column(name="expired",type="boolean")
   * @var boolean
   */
  protected $expired;

  /**
   * @orm:Column(name="expiresDateTime",type="datetime",nullable=true)
   * @var DateTime
   */
  protected $expiresAt;

  /**
   * @var array
   */
  protected $roles;

  /**
   * @orm:Column(name="credentialsExpired",type="boolean")
   * @var boolean
   */
  protected $credentialsExpired;

  /**
   * @orm:Column(name="credentialsExpireDateTime",type="datetime",nullable=true)
   * @var DateTime
   */
  protected $credentialsExpireAt;
  
  /**
   * @orm:Column(type="string",length=100)
   */
  protected $firstName;
  
  /**
   * @orm:Column(type="string",length=100)
   */
  protected $lastName;
  
  /**
   * @orm:Column(type="string",length=16)
   */
  protected $phone;
  
  /**
   * @orm:Column(type="string",length=16)
   */
  protected $mobile;
}