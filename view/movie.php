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
          <img class="cover lozad" width="500" height="750" src="<?= htmlspecialchars($movie->getPosterPath(500)); ?>" alt="<?= "Poster du film : " . htmlspecialchars($movie->getTitle()); ?>">
        </div>
        <div class="col col-12 col-md-4 col-lg-6">
          <h1 class="title"><?= htmlspecialchars($movie->getTitle()); ?></h1>
          <div class="display-2 mb-5"><?= round(htmlspecialchars($movie->getVoteAverage()), 1) ?><span class="display-6">/10</span></div>
          <p class="display-6"><?= formatTime(htmlspecialchars($movie->getRuntime())); ?></p>
          <div class="badges mb-2">
            <?php foreach ($movie->getGenres() as $genre) : ?>
              <span class="badge bg-secondary"><?= htmlspecialchars($genre->name); ?></span>
            <?php endforeach; ?>
          </div>
          <p class=""><?= htmlspecialchars($movie->getOverview()); ?></p>
          <?php if (Auth::id() > 0) : ?>
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="addToPlaylist" data-bs-toggle="dropdown" aria-expanded="false">
                Ajouter à la playlist
              </a>

              <ul class="dropdown-menu" aria-labelledby="addToPlaylist">
                <?php foreach ($playlists as $playlist) : ?>
                  <li><a class="dropdown-item" href="<?= "/playlist/" . htmlspecialchars($playlist->getId()) . "/addMovie/" . $movie->getId() ?>"><?= htmlspecialchars($playlist->getName()); ?></a></li>
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
    "url": "https://example.com/movie/<?= htmlspecialchars($movie->getId()); ?>",
    "name": "<?= htmlspecialchars($movie->getTitle()); ?>",
    "image": "<?= htmlspecialchars($movie->getPosterPath(200)); ?>",
    "dateCreated": "Unknown",
    "director": "Unknown",

    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "<?= htmlspecialchars($movie->getVoteAverage()) / 2; ?>",
    }
  }
  }
</script>
<?php inc_footer(); ?>