<?php

namespace MyMovies;

use Movie;

require_once "./api/API.php";
require_once "./class/Movie.php";

final class MovieAPI extends API
{
  public function find($id, $params = [])
  {
    $response = $this->get("movie/" . $id, $params);

    if ($response) {
      $data = json_decode($response);
      return new Movie($data);
    }
  }

  public function search($query, $params = [])
  {
    $params['query'] = $query;
    $response = $this->get('search/movie', $params);

    $movies = [];

    if ($response) {
      $arr = json_decode($response);

      foreach ($arr->results as $result) {
        $movies[] = new Movie($result);
      }
    }

    return $movies;
  }

  public function popular($params = [])
  {
    $response = $this->get('movie/popular', $params);

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
