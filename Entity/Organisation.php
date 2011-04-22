<?php

/**
 * This file is part of the Ai User Bundle
 *
 * (c) 2011 Mark Brennand, ACTiVEiNGREDiENT
 * 
 */

namespace Ai\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @orm:Entity(repositoryClass="Ai\UserBundle\Repository\OrganisationRepository")
 * @orm:Table(name="Organisations")
 */
class Organisation
{
  /**
   * @orm:Id
   * @orm:Column(
   *    name="organisationId",
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
   * @orm:Column(
   *    name="shortName",
   *    type="string",
   *    length="5",
   *    nullable=false
   * )
   *
   * @var string $shortName
   */
  protected $shortName;
  
  /**
   * @orm:OneToMany(
   *    targetEntity="Organisation",
   *    mappedBy="parent"
   * )
   *
   * @var ArrayCollection $children
   */
  protected $children;

  /**
   * @orm:ManyToOne(
   *    targetEntity="Organisation",
   *     inversedBy="children"
   * )
   * @orm:JoinColumn(
   *    name="parentOrganisationId",
   *    referencedColumnName="id"
   * )
   *
   * @var Ai\UserBundle\Entity\Organisation $parent
   */
  protected $parent;
  
  /**
   * @orm:OneToMany(
   *    targetEntity="User",
   *    inversedBy="organisation"
   * )
   */
  protected $users;
  
  /**
   * @orm:ManyToMany(targetEntity="User")
   * @orm:JoinTable(
   *    name="UsersOrganisations",
   *    joinColumns={@orm:JoinColumn(name="organisationId",referencedColumnName="id")},
   *    inverseJoinColumns={@orm:JoinColumn(name="userId",referencedColumnName="id")}
   * )
   *
   * @var ArrayCollection $associatedUsers
   */
  protected $associatedUsers;
  
  /**
   * @orm:OneToMany(
   *    targetEntity="OrganisationPreference",
   *    inversedBy="organisation"
   * )
   */
  protected $organisationPreferences;
  
  /**
   * @orm:Column(
   *    type="datetime",
   *    name="createdDateTime"
   * )
   *
   * @var DateTime $createdAt
   */
  protected $createdAt;
  
  public function __construct()
  {
    $this->createdAt = new \DateTime();
    $this->children = new ArrayCollection();
  }
 
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
  public function getOrganisationId()
  {
    return $this->getId();
  }
  
  /**
   * Gets the organisation name.
   *
   * @return string The name.
   */
  public function getName()
  {
    return $this->name;
  }
 
  /**
   * Sets the organisation name.
   *
   * @param string $value The name.
   */
  public function setName($value)
  {
    $this->name = $value;
  }
  
  /**
   * Gets the organisation short name (slug).
   *
   * @return string The name.
   */
  public function getShortName()
  {
    return $this->shortName;
  }
 
  /**
   * Sets the organisation short name (slug).
   *
   * @param string $value The name.
   */
  public function setShortName($value)
  {
    $this->shortName = $value;
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
   * Sets the organisation's preferences.
   *
   * @param ArrayCollection $value The organisation preferences.
   */
  public function setOrganisationPreferences($value)
  {
    $this->organisationPreferences = $value;
  }
  
  /**
   * Gets the organisation's preferences.
   * 
   * @return ArrayCollection $organisationPreferences
   */
  public function getOrganisationPreferences()
  {
    return $this->organisationPreferences;
  }
  
  /**
   * Add a preference to the list of organisation preferences
   */ 
  public function addOrganisationPreference($organisationPreference)
  {
    if(!$this->organisationPreferences->contains($organisationPreference))
    {
      $this->organisationPreferences->add($organisationPreference);
    }
  }
}