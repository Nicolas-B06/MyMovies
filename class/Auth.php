<?php

namespace MyMovies;

use MyMovies\UserModel;

use PDO;
use PDOException;

require_once './class/Connection.php';

class Auth
{
  private static $table = 'user';

  public static function register($data)
  {
    $pdo = Connection::getPDO();
    $userModel = new UserModel($pdo);
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    try {
      $result = $userModel->create($data);
      if ($result > 0) {
        $_SESSION['auth:id'] = $result;
        header("Location: /");
      }
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public static function login($email, $password)
  {
    $sql = "SELECT id, password FROM " . self::$table . " WHERE email = :email";
    $pdo = Connection::getPDO();
    try {
      $query = $pdo->prepare($sql);
      $query->execute(['email' => $email]);
      $query->setFetchMode(PDO::FETCH_OBJ);
      $result = $query->fetch();
      $verify = password_verify($password, $result->password);
      if ($verify) {
        $_SESSION['auth:id'] = $result->id;
        header("Location: /");
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
    header("Location: /login");
  }

  public static function check()
  {
    if (!isset($_SESSION['auth:id']) || empty($_SESSION['auth:id'])) {
      header('Location: /login');
    }
  }

  public static function admin()
  {
    self::check();
    $pdo = Connection::getPDO();
    $userModel = new UserModel($pdo);

    if (!isset($_SESSION['auth:role'])) {
      $user = $userModel->find($_SESSION['auth:id']);
      $_SESSION['auth:role'] = $user->getRole();
      header('Location: /admin');
    }
    if ((int) $_SESSION['auth:role'] < 1) {
      header('Location: /error');
    }
  }

  public static function id()
  {
    if (isset($_SESSION['auth:id'])) {
      return $_SESSION['auth:id'];
    }
  }
}
