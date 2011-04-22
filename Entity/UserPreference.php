<?php

/**
 * This file is part of the Ai User Bundle
 *
 * (c) 2011 Mark Brennand, ACTiVEiNGREDiENT
 * 
 */

namespace Ai\UserBundle\Entity;

/**
 * @orm:Entity(repositoryClass="Ai\UserBundle\Repository\UserPreferenceRepository")
 * @orm:Table(name="UserPreferences")
 */
class UserPreference extends Preference
{
  /**
   * @orm:ManyToOne(
   *    targetEntity="User",
   *    inversedBy="userPreferences"
   * )
   * @orm:JoinColumn(
   *    name="userId",
   *    referencedColumnName="id"
   * )
   */
  protected $user;
  
  /**
   * Sets the user
   *
   * @param Ai\UserBundle\Entity\User $value The user.
   */
  public function setUser($value)
  {
    $this->user = $value;
  }
  
  /**
   * Gets the user.
   * 
   * @return Ai\UserBundle\Entity\User $user
   */
  public function getUser()
  {
    return $this->user;
  }
}