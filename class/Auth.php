<?php

namespace MyMovies;

use PDO;
use PDOException;

require_once './class/Connection.php';

class Auth
{
  private static $table = 'user';

  public static function register(User $user)
  {
    // TODO : UserModel
    return $user;
  }

  public static function login($email, $password)
  {
    $sql = "SELECT id, role, password FROM " . self::$table . " WHERE email = :email";
    $pdo = Connection::getPDO();
    try {
      $query = $pdo->prepare($sql);
      $query->execute(['email' => $email]);
      $query->setFetchMode(PDO::FETCH_OBJ);
      $result = $query->fetch();

      $verify = password_verify($password, $result->password);
      if ($verify) {
        $_SESSION['auth:id'] = $result->id;
        $_SESSION['auth:role'] = $result->role;
        header('Location: /');
      }
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public static function logout()
  {
    unset($_SESSION['auth:id']);
    unset($_SESSION['auth:role']);
    session_destroy();
  }

  public static function check($role = 0)
  {
    if (!isset($_SESSION['auth:id']) || empty($_SESSION['auth:id'])) {
      header('Location: /login');
    }
    if (!isset($_SESSION['auth:role']) || (int) $_SESSION['auth:role'] < $role) {
      header('Location: /login');
    }
  }
}
