<?php

use MyMovies\Auth;

function formatTime($t)
{
  $m = $t % 60;
  $h = floor(($t % 3600) / 60);

  return "$h h $m min";
}

function ob_html_compress($buf)
{
  return str_replace(array("\n", "\r", "\t"), '', $buf);
}

function inc_header($title = '', $desc = '', $img = '', $keywords = [])
{
  ob_start('ob_html_compress');
?>
  <!DOCTYPE html>
  <html lang="fr-FR" prefix="og: https://ogp.me/ns#">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MyMovies - <?= $title ?></title>
    <meta name="description" content="<?= $desc ?>">
    <meta name="keywords" content="<?= "movie, playlist, film, cinema, serie" . implode(',', $keywords) ?>">

    <meta property="og:type" content="Article">
    <meta property="og:title" content="MyMovies - <?= $title ?>">
    <meta property="og:site_name" content="MyMovies">
    <meta property="og:url" content="">
    <meta property="og:description" content="<?= $desc ?>">
    <meta property="og:image" content="<?= $img ?>">

    <meta name="twitter:title" content="<?= $title ?>" />
    <meta name="twitter:description" content="<?= $desc ?>" />
    <meta name="twitter:image" content="<?= $img ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@<?= $title ?>" />
    <meta name="twitter:creator" content="@<?= $title ?>" />

    <link rel="canonical" href="http://www.votresite.com" />
    <link rel="alternate" href="http://www.votresite.com" hreflang="fr" />
    <link rel="alternate" href="http://www.votresite.com" hreflang="en" />
    <link rel="alternate" href="http://www.votresite.com" hreflang="es" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </head>

  <body class="d-flex flex-column min-vh-100">
    <noscript>il faut autoriser le javascript</noscript>
    <header class="mb-5">
      <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">MyMovies</a>
          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-2">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/about">A propos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="/contact">Contact</a>
              </li>
              <?php if (Auth::id() > 0) : ?>
                <li class="nav-item">
                  <a class="nav-link text-white" href="/profil">Mon profil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="/logout">Me déconnecter</a>
                </li>
              <?php else : ?>
                <li class="nav-item">
                  <a class="nav-link text-white" href="/register">inscription</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="/login">login</a>
                </li>
              <?php endif ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  <?php
}

function inc_footer()
{
  ?>
    <footer class="mt-auto bg-dark">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/legal" class="nav-link px-2 text-white">Mentions légales</a></li>
        <li class="nav-item"><a href="/about" class="nav-link px-2 text-white">A propos</a></li>
        <li class="nav-item"><a href="/contact" class="nav-link px-2 text-white">Contact</a></li>
      </ul>
      <p class="text-center text-muted">© 2022 MyMovies, Inc</p>
    </footer>
  </body>

  </html>
<?php
}
