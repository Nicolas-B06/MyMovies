<?php

require_once "DB.php";

class Playlist
{
  private $id, $userId, $name, $isPrivate, $duration, $movies, $db, $table, $moviesTable;

  public function __construct($userId = null, $name = null, $isPrivate = null, $duration = 0)
  {
    $this->db = new DB();
    $this->table = "playlist";
    $this->moviesTable = "playlist_movie";

    $this->userId = $userId;
    $this->id = null;
    $this->name = $name;
    $this->isPrivate = $isPrivate;
    $this->duration = $duration;
    $this->movies = [];
  }

  public function fetch($id)
  {
    $sql = "SELECT * FROM $this->table WHERE id = :id";
    try {
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute(["id" => $id]);
      $row = $stm->fetch();

      if ($row) {
        $this->userId = $row->userId;
        $this->id = $row->id;
        $this->name = $row->name;
        $this->isPrivate = $row->isPrivate;
        $this->duration = $row->duration;
        $this->fetchMovies();
      }
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function fetchAll()
  {
    $sql = "SELECT * FROM $this->table";
    try {
      $stm = $this->db->connect()->query($sql);
      $stm->execute();
      $rows = $stm->fetchAll();

      $playlists = [];
      foreach ($rows as $row) {
        $playlists[] = new self($row->userId, $row->id, $row->name, $row->isPrivate, $row->duration);
      }

      return $playlists;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function insert()
  {
    $sql = "INSERT INTO $this->table (userId, name, isPrivate, duration) ";
    $sql .= "VALUES(:userId, :name, :isPrivate, :duration)";
    try {
      $stm = $this->db->connect()->prepare($sql);
      $res = $stm->execute([
        'userId' => $this->userId,
        'name' => $this->name,
        'isPrivate' => $this->isPrivate,
        'duration' => $this->duration,
      ]);
      if ($res) {
        $this->id = $this->db->connect()->lastInsertId();
      }
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function update()
  {
    $sql = "UPDATE $this->table SET";
    $sql .=  " name = :name,";
    $sql .=  " isPrivate = :isPrivate,";
    $sql .=  " duration = :duration";
    $sql .=  " WHERE id = :id";
    try {
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute([
        'name' => $this->name,
        'isPrivate' => $this->isPrivate,
        'duration' => $this->duration,
        'id' => $this->id,
      ]);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function delete($id)
  {
    $sql = "DELETE FROM $this->table WHERE id = :id";
    try {
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute(["id" => $id]);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function fetchMovies()
  {
    $sql = "SELECT * FROM $this->moviesTable WHERE playlistId = :id";
    try {
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute(['id' => $this->id]);
      $rows = $stm->fetchAll();
      $this->movies = $rows;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function addMovie($movieId, $duration)
  {
    $sql = "INSERT INTO $this->moviesTable (playlistId, movieId)";
    $sql .= " VALUES(:playlistId, :movieId)";
    try {
      $stm = $this->db->connect()->prepare($sql);
      $res = $stm->execute([
        'playlistId' => $this->id,
        'movieId' => $movieId,
      ]);
      if ($res) {
        $this->duration += $duration;
        $this->update();
      }
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function removeMovie($movieId, $duration)
  {
    $sql = "DELETE FROM $this->moviesTable WHERE movieId = :movieId AND playlistId = :playlistId";
    try {
      $stm = $this->db->connect()->prepare($sql);
      $res = $stm->execute([
        "movieId" => $movieId,
        "playlistId" => $this->id
      ]);
      if ($res) {
        $this->duration -= $duration;
        $this->update();
      }
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of isPrivate
   */
  public function getIsPrivate()
  {
    return $this->isPrivate;
  }

  /**
   * Set the value of isPrivate
   *
   * @return  self
   */
  public function setIsPrivate($isPrivate)
  {
    $this->isPrivate = $isPrivate;

    return $this;
  }

  /**
   * Get the value of movies
   */
  public function getMovies()
  {
    return $this->movies;
  }

  /**
   * Get the value of duration
   */
  public function getDuration()
  {
    return $this->duration;
  }

  /**
   * Get the value of userId
   */
  public function getUserId()
  {
    return $this->userId;
  }

  /**
   * Set the value of userId
   *
   * @return  self
   */
  public function setUserId($userId)
  {
    $this->userId = $userId;

    return $this;
  }
}