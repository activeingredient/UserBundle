<?php

/**
 * This file is part of the Ai User Bundle
 *
 * (c) 2011 Mark Brennand, ACTiVEiNGREDiENT
 * 
 */

namespace Ai\UserBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * @orm:Entity(repositoryClass="Ai\UserBundle\Repository\RoleRepository")
 * @orm:Table(name="Roles")
 */
class Role implements RoleInterface
{
  /**
   * @orm:Id
   * @orm:Column(type="integer")
   * @orm:GeneratedValue(strategy="AUTO")
   *
   * @var integer $roleId
   */
  protected $roleId;
  
  /**
   * @orm:Column(
   *    name="name",
   *    type="string",
   *    length="255",
   *    nullable=false
   * )
   *
   * @var string $name
   */
  protected $name;
  
  /**
   * @orm:Column(
   *    type="datetime",
   *    name="created_DateTime"
   * )
   *
   * @var DateTime $createdAt
   */
  protected $createdAt;
 
  /**
   * Gets the role name.
   *
   * @return string The name.
   */
  public function getName()
  {
    return $this->name;
  }
 
  /**
   * Sets the role name.
   *
   * @param string $value The name.
   */
  public function setName($value)
  {
    $this->name = $value;
  }
 
  /**
   * Gets the DateTime the role was created.
   *
   * @return DateTime A DateTime object.
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * Constructs a new instance of Role.
   */
  public function __construct()
  {
    $this->createdAt = new \DateTime();
  }

  /**
   * Implementation of getRole for the RoleInterface.
   * 
   * @return string The role.
   */
  public function getRole()
  {
    return $this->getName();
  }
}