<?php

include_once "DB.php";

class Auth
{
  private $db;

  public function __construct()
  {
    $this->db = new DB();
  }

  public function login($email, $password)
  {
    $sql = "SELECT id FROM user WHERE email = :email AND password = :password";
    $stm = $this->db->connect()->prepare($sql);
    $stm->execute(['email' => $email, 'password' => $password]);
    $res = $stm->fetch();

    if ($res) {
      $_SESSION['auth'] = $res->id;
    }
  }

  public function logout()
  {
    unset($_SESSION['auth']);
    session_destroy();
  }
}