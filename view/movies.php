<?php

use MyMovies\MovieAPI;

$movieApi = new MovieAPI();
$movies = $movieApi->popular();

// Header
inc_header(
  'Les films populaires du moment',
  'Fusce scelerisque pellentesque consequat. Duis pharetra nibh magna, ac blandit tortor posuere rhoncus. Ut id fermentum neque. Aliquam erat volutpat. Suspendisse aliquam ante dolor. Donec posuere dui turpis, non ultrices nunc euismod vitae. Curabitur id ipsum sit amet eros laoreet molestie sed in risus. Pellentesque',
  '',
  []
)
?>
<main class="my-5">
  <section id="movies">
    <div class="container">
      <h1 class="mb-5">Les films populaires du moment</h1>
      <div class="row">
        <?php foreach ($movies as $movie) : ?>
          <div class="col col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card mb-2">
              <img class="card-img-top contain lozad" width="200" height="300" src="<?= $movie->getPosterPath(200); ?>" alt="<?= "Poster du film : " . $movie->getTitle(); ?>">
              <div class="card-body">
                <p class="card-title h5"><?= $movie->getTitle(); ?></p>
                <p class="card-text"><?= substr($movie->getOverview(), 0, 100) . "..." ?></p>
                <a href="/movie/<?= $movie->getId(); ?>" class="btn btn-primary">Details</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>
<?php inc_footer(); ?>