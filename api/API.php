<?php

namespace MyMovies;

require_once './config.php';

abstract class API
{
  protected $curl;

  public function __construct()
  {
    $this->curl = curl_init();

    curl_setopt_array($this->curl, array(
      CURLOPT_RETURNTRANSFER => true,
    ));
  }

  protected function get($endpoint = '', $params = [])
  {
    $route = API_URI . $endpoint . "?api_key=" . API_KEY;
    foreach ($params as $key => $value) {
      $route .= "&" . $key . "=" . $value;
    }

    curl_setopt($this->curl, CURLOPT_URL, $route);
    curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "GET");

    return curl_exec($this->curl);
  }

  public function close()
  {
    curl_close($this->curl);
  }
}
