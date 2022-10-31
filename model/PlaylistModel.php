<?php

namespace MyMovies;

use Exception;
use PDO;
use PDOException;

require_once "./model/Model.php";
require_once "./class/Playlist.php";

final class PlaylistModel extends Model
{
  protected $table = 'playlist';
  protected $class = Playlist::class;

  protected $movieTable = 'playlist_movie';

  public function findByUserId($userId)
  {
    $sql = "SELECT * FROM " . $this->table . " WHERE userId = :userId";
    try {
      $query = $this->pdo->prepare($sql);
      $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->class);
      $query->execute(['userId' => $userId]);
      return $query->fetchAll();
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function getMovies($playlistId)
  {
    $sql = "SELECT * FROM" . $this->movieTable . " WHERE playlist id = :id";
    try {
      $query = $this->pdo->prepare($sql);
      $query->setFetchMode(PDO::FETCH_OBJ);
      return $query->execute(['id' => $playlistId]);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function addMovie($playlistId, $movieId, $movieDuration)
  {
    $sqlMovie = "INSERT INTO " . $this->movieTable . " VALUES (:playlistId, :movieId)";
    $sqlDuration = "UPDATE " . $this->table . " SET duration = duration + :movieDuration";

    try {
      $this->pdo->beginTransaction();

      $queryMovie = $this->pdo->prepare($sqlMovie);
      $queryMovie->execute(['movieId' => $movieId, 'playlistId' => $playlistId]);

      $queryDuration = $this->pdo->prepare($sqlDuration);
      $queryDuration->execute(['movieDuration' => $movieDuration]);

      $this->pdo->commit();
    } catch (PDOException $e) {
      $this->pdo->rollBack();
      die($e->getMessage());
    }
  }

  public function removeMovie($playlistId, $movieId, $movieDuration)
  {
    $sqlMovie = "DELETE FROM " . $this->movieTable . " WHERE movieId = :movieId AND playlistId = :playlistId";
    $sqlDuration = "UPDATE " . $this->table . " SET duration = duration - :movieDuration";

    try {
      $this->pdo->beginTransaction();

      $queryMovie = $this->pdo->prepare($sqlMovie);
      $queryMovie->execute(['movieId' => $movieId, 'playlistId' => $playlistId]);

      // We need that to know if the row existed
      if (!$queryMovie->rowCount()) {
        throw new Exception('Not Found');
      }

      $queryDuration = $this->pdo->prepare($sqlDuration);
      $queryDuration->execute(['movieDuration' => $movieDuration]);
      $this->pdo->commit();
    } catch (PDOException $e) {
      $this->pdo->rollBack();
      die($e->getMessage());
    }
  }
}
