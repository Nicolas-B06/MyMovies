<?php

class Movie
{
  private $id;
  private $title;
  private $overview;
  private $posterPath;
  private $voteAverage;
  private $runtime;
  private $genres;

  private $basePosterPath = "https://image.tmdb.org/t/p/";

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
    if (isset($data->runtime)) {
      $this->runtime = $data->runtime;
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
   * Get the value of title
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Get the value of overview
   */
  public function getOverview()
  {
    return $this->overview;
  }

  /**
   * Get the value of posterPath
   */
  public function getPosterPath($size)
  {
    return $this->basePosterPath . "w" . $size . "/" . $this->posterPath;
  }

  /**
   * Get the value of voteAverage
   */
  public function getVoteAverage()
  {
    return $this->voteAverage;
  }

  /**
   * Get the value of runtime
   */
  public function getRuntime()
  {
    return $this->runtime;
  }

  /**
   * Get the value of genres
   */
  public function getGenres()
  {
    return $this->genres;
  }
}
