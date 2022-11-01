<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\PlaylistModel;
use MyMovies\UserModel;

require_once "./class/Auth.php";
require_once "./class/Connection.php";

require_once './model/UserModel.php';

Auth::admin();

$userModel = new UserModel(Connection::getPDO());
$user = $userModel->find($userId);

$playlistModel = new PlaylistModel(Connection::getPDO());
$playlists = $playlistModel->findByUserId($userId);

if (!$user) {
  header('Location: /admin');
}

?>

<!-- Header -->


<div>
  <div><?= htmlspecialchars($user->getName()) ?></div>
  <div><?= htmlspecialchars($user->getEmail()) ?></div>
  <div><?= htmlspecialchars($user->getPassword()) ?></div>
  <div><?= htmlspecialchars($user->getRole()) ?></div>
  <form action="<?= "/admin/user/" . htmlspecialchars($user->getId()) . "/delete" ?>" method="get">
    <button type="submit">Supprimer l'utilisateur</button>
  </form>

  <?php foreach ($playlists as $playlist) : ?>
    <div>
      <div><?= htmlspecialchars($playlist->getName()) ?></div>
      <a href="<?= "/admin/user/" . $userId . "/playlist/" . htmlspecialchars($playlist->getId()) ?>">Voir playlist</a>
    </div>
  <?php endforeach ?>

</div>


<!-- Footer -->