<?php

class Movie
{
  private $id;
  private $title;
  private $overview;
  private $posterPath;
  private $voteAverage;
  private $genres;

  public function __construct($data)
  {
    if (isset($data->id)) {
      $this->id = $data->id;
    }
    if (isset($data->title)) {
      $this->title = $data->title;
    }
    if (isset($data->overview)) {
      $this->overview = $data->overview;
    }
    if (isset($data->poster_path)) {
      $this->posterPath = $data->poster_path;
    }
    if (isset($data->vote_average)) {
      $this->voteAverage = $data->vote_average;
    }
    if (isset($data->genres)) {
      $this->genres = $data->genres;
    }
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
   * Get the value of title
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get the value of overview
   */
  public function getOverview()
  {
    return $this->overview;
  }

  /**
   * Set the value of overview
   *
   * @return  self
   */
  public function setOverview($overview)
  {
    $this->overview = $overview;

    return $this;
  }

  /**
   * Get the value of posterPath
   */
  public function getPosterPath()
  {
    return $this->posterPath;
  }

  /**
   * Set the value of posterPath
   *
   * @return  self
   */
  public function setPosterPath($posterPath)
  {
    $this->posterPath = $posterPath;

    return $this;
  }

  /**
   * Get the value of voteAverage
   */
  public function getVoteAverage()
  {
    return $this->voteAverage;
  }

  /**
   * Set the value of voteAverage
   *
   * @return  self
   */
  public function setVoteAverage($voteAverage)
  {
    $this->voteAverage = $voteAverage;

    return $this;
  }

  /**
   * Get the value of genres
   */
  public function getGenres()
  {
    return $this->genres;
  }

  /**
   * Set the value of genres
   *
   * @return  self
   */
  public function setGenres($genres)
  {
    $this->genres = $genres;

    return $this;
  }
}
