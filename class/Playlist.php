<?php

require_once "DB.php";

class Playlist
{
  private $id, $name, $isPrivate, $duration, $movies, $db, $table, $moviesTable;

  public function __construct($id = null, $name = null, $isPrivate = null, $duration = 0)
  {
    $this->db = new DB();
    $this->table = "playlist";
    $this->moviesTable = "playlist_movie";

    $this->id = $id;
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

      $this->id = $row->id;
      $this->name = $row->name;
      $this->isPrivate = $row->isPrivate;
      $this->fetchMovies();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function insert()
  {
    $sql = "INSERT INTO $this->table (name, isPrivate) VALUES(:name, :isPrivate)";
    try {
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute(['name' => $this->name, 'isPrivate' => $this->isPrivate]);
      $this->id = $this->db->connect()->lastInsertId();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function fetchMovies()
  {
    $sql = "SELECT * FROM $this->moviesTable WHERE id_playlist = :id";
    try {
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute(['id' => $this->id]);
      $rows = $stm->fetchAll();

      $this->movies = $rows;
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
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
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
}