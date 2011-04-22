<?php

/**
 * This file is part of the Ai User Bundle
 *
 * (c) 2011 Mark Brennand, ACTiVEiNGREDiENT
 * 
 */

namespace Ai\UserBundle\Entity;

/**
 * @orm:Entity(repositoryClass="Ai\UserBundle\Repository\OrganisationPreferenceRepository")
 * @orm:Table(name="OrganisationPreferences")
 */
class OrganisationPreference extends Preference
{
  /**
   * @orm:ManyToOne(
   *    targetEntity="Organisation",
   *    inversedBy="organisationPreferences"
   * )
   * @orm:JoinColumn(
   *    name="organisationId",
   *    referencedColumnName="id"
   * )
   */
  protected $organisation;
  
  /**
   * Sets the organisation
   *
   * @param Ai\UserBundle\Entity\Organisation $value The organisation.
   */
  public function setOrganisation($value)
  {
    $this->organisation = $value;
  }
  
  /**
   * Gets the organisation.
   * 
   * @return Ai\UserBundle\Entity\Organisation $organisation
   */
  public function getOrganisation()
  {
    return $this->organisation;
  }
}