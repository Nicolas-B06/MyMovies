<?php

namespace MyMovies;

use PDO;
use PDOException;

require_once './config.php';

class Connection
{
  public static function getPDO()
  {
    try {
      $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";chartset=utf8", DB_USER, DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

      return $dbh;
    } catch (PDOException $e) {
      die($e);
    }
  }
}
