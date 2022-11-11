<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\PlaylistModel;
use MyMovies\UserModel;

Auth::check();

$userModel = new UserModel(Connection::getPDO());
$user = $userModel->find($userId);

$playlistModel = new PlaylistModel(Connection::getPDO());
$playlists = $playlistModel->findByUserId($userId);

inc_header(); ?>
<main class="my-5">
    <div class="container">
        <div class="container-wrap">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Mon Compte</h1>
                </div>
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

            </div>
        </div>
    </div>
</main>
<?php inc_footer(); ?>