<?php

namespace MyMovies;

class Playlist
{
  private $id, $userId, $name, $isPrivate, $duration;

  public function __construct($id = null, $userId = null, $name = null, $duration = 0, $isPrivate = 0)
  {
    $this->id = $id;
    $this->userId = $userId;
    $this->name = $name;
    $this->isPrivate = $isPrivate;
    $this->duration = $duration;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of userId
   */
  public function getUserId()
  {
    return $this->userId;
  }

  /**
   * Set the value of userId
   *
   * @return  self
   */
  public function setUserId($userId)
  {
    $this->userId = $userId;

    return $this;
  }

  /**
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of isPrivate
   */
  public function getIsPrivate()
  {
    return $this->isPrivate;
  }

  /**
   * Set the value of isPrivate
   *
   * @return  self
   */
  public function setIsPrivate($isPrivate)
  {
    $this->isPrivate = $isPrivate;

    return $this;
  }

  /**
   * Get the value of duration
   */
  public function getDuration()
  {
    return $this->duration;
  }

  /**
   * Set the value of duration
   *
   * @return  self
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;

    return $this;
  }
}
