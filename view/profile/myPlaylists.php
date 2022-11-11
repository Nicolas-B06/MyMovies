<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\MovieAPI;
use MyMovies\PlaylistModel;

Auth::check();

$playlistModel = new PlaylistModel(Connection::getPDO());
$playlist = $playlistModel->find($playlistId);

$movieIds = $playlistModel->getMovieIds($playlist->getId());

$movieApi = new MovieAPI();

$movies = [];
foreach ($movieIds as $movieId) {
    $movies[] = $movieApi->find($movieId[1]);
}

inc_header(); ?>

<main class="my-5">
    <section id="info">
        <div>
            <div><?= htmlspecialchars($playlist->getName()) ?></div>
            <div><?= htmlspecialchars($playlist->getDuration()) ?></div>
            <form action="<?= "/admin/user/" . $userId . "/playlist/" . htmlspecialchars($playlist->getId()) . "/delete" ?>" method="get">
                <button type="submit">Supprimer la playlist</button>
            </form>
        </div>
    </section>
    <section id="movies">
        <?php foreach ($movies as $movie) : ?>
            <div>
                <div><?= htmlspecialchars($movie->getTitle()) ?></div>
                <div><?= htmlspecialchars($movie->getOverview()) ?></div>
            </div>
        <?php endforeach ?>
    </section>
</main>

<?php inc_footer(); ?>