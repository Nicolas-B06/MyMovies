<?php

namespace MyMovies;

use PDO;
use PDOException;

class Auth
{
  public static function register(User $user)
  {
    // TODO : UserModel
    return $user;
  }

  public static function login($email, $password)
  {
    $sql = "SELECT id, password WHERE email = :email";
    $pdo = Connection::getPDO();
    try {
      $query = $pdo->prepare($sql);
      $query->execute(['email' => $email]);
      $query->setFetchMode(PDO::FETCH_OBJ);
      $result = $query->fetch();

      $verify = password_verify($password, $result->password);
      if ($verify) {
        $_SESSION['auth'] = $result->id;
      }
      return $verify;
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public static function logout()
  {
    unset($_SESSION['auth']);
    session_destroy();
  }

  public static function check()
  {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
      header('Location: /login');
    }
  }
}
