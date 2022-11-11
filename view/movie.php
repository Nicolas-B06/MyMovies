<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\MovieAPI;
use MyMovies\PlaylistModel;

$movieApi = new MovieAPI();
$movie = $movieApi->find($id);

if (Auth::id() > 0) {
  $playlistModel = new PlaylistModel(Connection::getPDO());
  $playlists = $playlistModel->findByUserId(Auth::id());
}

// Header
inc_header(
  'Les films populaires du moment',
  'Fusce scelerisque pellentesque consequat. Duis pharetra nibh magna, ac blandit tortor posuere rhoncus.',
  '',
  ['populaire']
)

?>

<main class="my-5">
  <section id="movie">
    <div class="container">
      <div class="row">
        <div class="col col-12 col-md-8 col-lg-6">
          <img class="cover lozad" width="500" height="750" src="<?= $movie->getPosterPath(500); ?>" alt="<?= "Poster du film : " . $movie->getTitle(); ?>">
        </div>
        <div class="col col-12 col-md-4 col-lg-6">
          <h1 class="title"><?= $movie->getTitle(); ?></h1>
          <div class="display-2 mb-5"><?= round($movie->getVoteAverage(), 1) ?><span class="display-6">/10</span></div>
          <p class="display-6"><?= formatTime($movie->getRuntime()); ?></p>
          <div class="badges mb-2">
            <?php foreach ($movie->getGenres() as $genre) : ?>
              <span class="badge bg-secondary"><?= $genre->name; ?></span>
            <?php endforeach; ?>
          </div>
          <p class=""><?= $movie->getOverview(); ?></p>
          <?php if (Auth::id() > 0) : ?>
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="addToPlaylist" data-bs-toggle="dropdown" aria-expanded="false">
                Ajouter à la playlist
              </a>

              <ul class="dropdown-menu" aria-labelledby="addToPlaylist">
                <?php foreach ($playlists as $playlist) : ?>
                  <li><a class="dropdown-item" href="<?= "/playlist/" . $playlist->getId() . "/addMovie/" . $movie->getId() ?>"><?= $playlist->getName(); ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</main>
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Movie",
    "url": "https://example.com/movie/<?= $movie->getId(); ?>",
    "name": "<?= $movie->getTitle(); ?>",
    "image": "<?= $movie->getPosterPath(200); ?>",
    "dateCreated": "Unknown",
    "director": "Unknown",

    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "<?= $movie->getVoteAverage() / 2; ?>",
    }
  }
  }
</script>
<?php inc_footer(); ?>