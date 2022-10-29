<?php

require_once dirname(__DIR__) . '/config.php';

class DB
{
  private $host, $dbname, $user, $password, $dbh;

  public function __construct()
  {
    $this->host = DB_HOST;
    $this->dbname = DB_NAME;
    $this->user = DB_USER;
    $this->password = DB_PASSWORD;

    $this->init();
  }

  private function init()
  {
    try {
      $dbh = new PDO("mysql:host=$this->host;dbname=$this->dbname;chartset=utf8", $this->user, $this->password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

      $this->dbh = $dbh;
    } catch (PDOException $e) {
      die($e);
    }
  }

  public function connect()
  {
    return $this->dbh;
  }
}
