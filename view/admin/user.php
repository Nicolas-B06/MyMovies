<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\PlaylistModel;
use MyMovies\UserModel;

Auth::admin();

$userModel = new UserModel(Connection::getPDO());
$user = $userModel->find($userId);

$playlistModel = new PlaylistModel(Connection::getPDO());
$playlists = $playlistModel->findByUserId($userId);

if (!$user) {
  header('Location: /admin');
}

?>

<?php inc_header(); ?>

<main class="my-5">
  <div>
    <h1 class="text-center">Playlist utilisateur</h1>
    <div class="container">
      <div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($playlists as $playlist) : ?>
                    <tr>
                      <th scope="row"><?= $playlist->getId() ?></th>
                      <td><?= htmlspecialchars($playlist->getName()) ?></td>
                      <td>
                        <a href="<?= "/admin/user/" . $userId . "/playlist/" . htmlspecialchars($playlist->getId()) ?>" class="btn btn-primary">Voir</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</main>

<?php inc_footer(); ?>