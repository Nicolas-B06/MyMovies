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
  <div>
    <h1 class="text-center"><?= htmlspecialchars($playlist->getName()) ?></h1>
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
                  <?php foreach ($movies as $movie) : ?>
                    <tr>
                      <th scope="row"><?= $movie->getId() ?></th>
                      <td><?= htmlspecialchars($movie->getTitle()) ?></td>
                      <td>
                        <a href="<?= "/movie/" . $movie->getId() ?>" class="btn btn-primary">Voir</a>
                      </td>
                      <td>
                        <a href="<?= "/playlist/" . $playlist->getId() . "/movie/" . $movie->getId() . "/delete" ?>" class="btn btn-danger">Supprimer</a>
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
</main>

<?php inc_footer(); ?>