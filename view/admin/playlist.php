<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\MovieAPI;
use MyMovies\PlaylistModel;

Auth::admin();

$playlistModel = new PlaylistModel(Connection::getPDO());
$playlist = $playlistModel->find($playlistId);

if (!$playlist) {
  header('Location: /admin');
}

$movieIds = $playlistModel->getMovieIds($playlist->getId());

$movieApi = new MovieAPI();

$movies = [];
foreach ($movieIds as $movieId) {
  $movies[] = $movieApi->find($movieId[1]);
}

?>

<!-- Header -->

<div>
  <div><?= htmlspecialchars($playlist->getName()) ?></div>
  <div><?= htmlspecialchars($playlist->getDuration()) ?></div>
  <form action="<?= "/admin/user/" . $userId . "/playlist/" . htmlspecialchars($playlist->getId()) . "/delete" ?>" method="get">
    <button type="submit">Supprimer la playlist</button>
  </form>
</div>

<?php foreach ($movies as $movie) : ?>
  <div>
    <div><?= htmlspecialchars($movie->getTitle()) ?></div>
    <div><?= htmlspecialchars($movie->getOverview()) ?></div>
  </div>
<?php endforeach ?>

<footer class="mt-auto bg-dark">
  <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Mentions légales</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">A propos</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Contact</a></li>
  </ul>
  <p class="text-center text-muted">© 2022 Company, Inc</p>
</footer>

<!-- Footer -->