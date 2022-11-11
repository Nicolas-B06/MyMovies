<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\PlaylistModel;

Auth::check();

$playlistModel = new PlaylistModel(Connection::getPDO());
$playlists = $playlistModel->findByUserId(Auth::id());

inc_header(); ?>

<main class="my-5">
    <section id="playlist">
        <div class="container">
            <h1 class="title mb-5">Mes Playlist</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Durée</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($playlists as $playlist) : ?>
                        <tr>
                            <td><?= htmlspecialchars($playlist->getName()) ?></td>
                            <td><?= formatTime(htmlspecialchars($playlist->getDuration())) ?></td>
                            <td>
                                <a class="" href="/playlist/<?= htmlspecialchars($playlist->getId()) ?>">Voir la playlist</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="/playlist/create" class="btn btn-primary">Créer une playlist</a>
        </div>
    </section>
</main>

<?php inc_footer(); ?>