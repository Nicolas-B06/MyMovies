<?php

namespace MyMovies;

use PDO;
use Exception;

// TODO : Implement exceptions
abstract class Model
{
  protected $pdo;
  protected $table = null;
  protected $class = null;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function find(int $id)
  {
    $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
    try {
      $query = $this->pdo->prepare($sql);
      $query->execute(['id' => $id]);
      $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->class);
      return $query->fetch();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function all()
  {
    $sql = "SELECT * FROM " . $this->table;
    try {
      $query = $this->pdo->query($sql);
      return $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->class);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($data)
  {
    $sql = "INSERT INTO " . $this->table . " (" . implode(", ", array_keys($data)) . ")
    VALUES (" . implode(", ", array_map(function ($key) {
      return ":" . $key;
    }, array_keys($data))) . ")";
    try {
      $query = $this->pdo->prepare($sql);
      $query->execute($data);
      return $this->pdo->lastInsertId();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function update($data, $id)
  {
    $sql = "UPDATE " . $this->table . " SET " . implode(", ", array_map(function ($key) {
      return $key . " = :" . $key;
    }, array_keys($data))) . " WHERE id = :id";
    $data['id'] = $id; // This need to be after $sql assignement
    try {
      $query = $this->pdo->prepare($sql);
      $query->execute($data);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function delete($id)
  {
    $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
    try {
      $query = $this->pdo->prepare($sql);
      $query->execute(['id' => $id]);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
