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
   * @orm:Column(
   *    name="roleId",
   *    type="integer"
   * )
   * @orm:GeneratedValue(strategy="AUTO")
   *
   * @var integer $id
   */
  protected $id;
  
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
   * @orm:ManyToMany(targetEntity="User")
   * @orm:JoinTable(
   *    name="UsersRoles",
   *    joinColumns={@orm:JoinColumn(name="roleId",referencedColumnName="id")},
   *    inverseJoinColumns={@orm:JoinColumn(name="userId",referencedColumnName="id")}
   * )
   *
   * @var ArrayCollection $users
   */
  protected $users;
  
  /**
   * @orm:Column(
   *    type="datetime",
   *    name="modifiedDateTime"
   * )
   *
   * @var DateTime $createdAt
   */
  protected $createdAt;
 
  /**
   * Gets the id.
   *
   * @return string The name.
   */
  public function getId()
  {
    return $this->id;
  }
  
  /**
   * ID wrapper
   *
   * @return id $id
   */
  public function getRoleId()
  {
    return $this->getId();
  }
  
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
   * Implementation of getRole for the RoleInterface.
   * 
   * @return string The role.
   */
  public function getRole()
  {
    return $this->getName();
  }
  
  /**
   * Gets the users collection.
   *
   * @return ArrayCollection The users.
   */
  public function getUsers()
  {
    return $this->users;
  }
 
  /**
   * Sets the users collection.
   *
   * @param ArrayCollection $value The users.
   */
  public function setUsers($value)
  {
    $this->users = $users;
  }

  /**
   * Constructs a new instance of Role.
   */
  public function __construct()
  {
    $this->createdAt = new \DateTime();
  }
}