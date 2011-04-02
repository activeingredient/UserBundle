<?php

namespace Ai\UserBundle\Entity;

use FOS\UserBundle\Entity\User as AbstractUser;

/**
 * @orm:Entity
 */
class User extends AbstractUser
{
  /**
   * @orm:Id
   * @orm:Column(type="integer")
   * @orm:generatedValue(strategy="AUTO")
   */
  protected $userId;
}