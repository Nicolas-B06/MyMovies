<?php

use MyMovies\MovieAPI;

$movieApi = new MovieAPI();
$movies = $movieApi->popular();

// Header
include_once "./includes/header.php";

?>

<section id="movies">
  <div class="container">
    <div class="row">
      <?php foreach ($movies as $movie) : ?>
        <div class="col col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card mb-2">
            <img class="card-img-top contain lozad" width="200" height="300" src="<?= $movie->getPosterPath(200); ?>" alt="<?= "Poster du film : " . $movie->getTitle(); ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $movie->getTitle(); ?></h5>
              <p class="card-text"><?= substr($movie->getOverview(), 0, 100) . "..." ?></p>
              <a href="/movie/<?= $movie->getId(); ?>" class="btn btn-primary">Details</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>