<?php

/**
 * This file is part of the Ai User Bundle
 *
 * (c) 2011 Mark Brennand, ACTiVEiNGREDiENT
 * 
 */

namespace Ai\UserBundle\Entity;

/**
 * @orm:Entity(repositoryClass="Ai\UserBundle\Repository\PreferenceRepository")
 * @orm:Table(name="Preferences")
 * @orm:InheritanceType("SINGLE_TABLE")
 * @orm:DiscriminatorColumn(name="type", type="string")
 * @orm:DiscriminatorMap({"p"="Preference", "o"="OrganisationPreference", "u"="UserPreference"})
 */
class Preference
{
  /**
   * @orm:Id
   * @orm:Column(
   *    name="preferenceId",
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
   *    name="value",
   *    type="string",
   *    length="4000",
   *    nullable=false
   * )
   *
   * @var string $value
   */
  protected $value;
  
  /**
   * @orm:Column(
   *    name="negotiable",
   *    type="boolean",
   *    nullable=false
   * )
   *
   * @var string $negotiable
   */
  protected $negotiable;
  
  /**
   * @orm:Column(
   *    type="datetime",
   *    name="createdDateTime"
   * )
   *
   * @var DateTime $createdAt
   */
  protected $createdAt;
  
  /**
   * @orm:Column(
   *    type="integer",
   *    name="createdBy"
   * )
   *
   * @var integer $createdBy
   */
  protected $createdBy;
  
  /**
   * @orm:Column(
   *    type="datetime",
   *    name="modifiedDateTime"
   * )
   *
   * @var DateTime $updatedAt
   */
  protected $updatedAt;
  
  /**
   * @orm:Column(
   *    type="integer",
   *    name="modifiedBy"
   * )
   *
   * @var integer $updatedBy
   */
  protected $updatedBy;
 
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
  public function getPreferenceId()
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
   * Sets the preference name.
   *
   * @param string $value The name.
   */
  public function setName($value)
  {
    $this->name = $value;
  }
  
  /**
   * Gets the value for this preference.
   *
   * @return string The name.
   */
  public function getValue()
  {
    return $this->value;
  }
  
  /**
   * Sets the preference value.
   *
   * @param string $value The value.
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  
  /**
   * Gets the negotiable value.
   *
   * @return boolean negotiable.
   */
  public function getNegotiable()
  {
    return $this->negotiable;
  }
  
  /**
   * Sets the negotiable value.
   *
   * @param boolean $value The value.
   */
  public function setNegotiable($value)
  {
    $this->negotiable = $value;
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
   * Gets the user id of the creator
   *
   * @return integer createdBy.
   */
  public function getCreatedBy()
  {
    return $this->createdBy;
  }
  
  /**
   * Sets the user id of the creator
   *
   * @param integer $value The value.
   */
  public function setCreatedBy($value)
  {
    $this->createdBy = $value;
  }
  
  /**
   * Gets the DateTime the role was updated.
   *
   * @return DateTime A DateTime object.
   */
  public function getUpdatedt()
  {
    return $this->updatedAt;
  }
  
  /**
   * Sets the DateTime the role was updated.
   *
   * @param DateTime A DateTime object.
   */
  public function setUpdatedt(\DateTime $value)
  {
    $this->updatedAt = $value;
  }
  
  /**
   * Gets the user id of the updater
   *
   * @return integer updatedBy.
   */
  public function getUpdatedBy()
  {
    return $this->updatedBy;
  }
  
  /**
   * Sets the user id of the updater
   *
   * @param integer $value The value.
   */
  public function setUpdatedBy($value)
  {
    $this->updatedBy = $value;
  }

  /**
   * Constructs a new instance of Role.
   */
  public function __construct()
  {
    $this->createdAt = new \DateTime();
  }
}