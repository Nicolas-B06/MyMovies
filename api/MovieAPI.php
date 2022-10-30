<?php

namespace MyMovies;

use Movie;

require_once "./api/API.php";
require_once "./class/Movie.php";

final class MovieAPI extends API
{
  protected $ressource = 'movie';

  public function find($id, $params = [])
  {
    $response = $this->get($id, $params);

    if ($response) {
      $data = json_decode($response);
      return new Movie($data);
    }
  }

  public function popular($params = [])
  {
    $response = $this->get('popular', $params);

    $movies = [];

    if ($response) {
      $arr = json_decode($response);

      foreach ($arr->results as $result) {
        $movies[] = new Movie($result);
      }
    }

    return $movies;
  }
}
