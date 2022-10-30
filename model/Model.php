<?php

namespace MyMovies;

use PDO;
use PDOException;
use Exception;

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
      $result = $query->fetch();
      if (!$result) {
        return new Exception("Element not found", 404);
      }
      return $result;
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function all()
  {
    $sql = "SELECT * FROM " . $this->table;
    try {
      $query = $this->pdo->query($sql);
      $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->class);
      return $query->fetchAll();
    } catch (PDOException $e) {
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
    } catch (PDOException $e) {
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
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function delete($id)
  {
    $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
    try {
      $query = $this->pdo->prepare($sql);
      $query->execute(['id' => $id]);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}
