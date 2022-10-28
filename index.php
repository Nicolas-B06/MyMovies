<?php

/* fonction aqui supprime les tabulations, sauts de ligne et les retours à la ligne */

function ob_html_compress($buf)
{
  return str_replace(array("\n", "\r", "\t"), '', $buf);
}

ob_start('ob_html_compress');

?>

<!DOCTYPE html>
<html lang="fr-FR" prefix="og: https://ogp.me/ns#">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="google-site-verification" content="">
  <meta property="og:type" content="Article">
  <meta property="og:title" content="Comment filtrer l'eau du robinet">
  <meta property="og:site_name" content="Futura">
  <meta property="og:url" content="">
  <meta property="og:description" content="">
  <meta property="og:image" content="">
  <meta name="twitter:title" content="title" />
  <meta name="twitter:description" content="" />
  <meta name="twitter:image" content="http://www.votresite.com/images/og-image.jpg" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@votresite" />
  <meta name="twitter:creator" content="@votresite" />
  <link rel="canonical" href="http://www.votresite.com" />
  <link rel="alternate" href="http://www.votresite.com" hreflang="fr" />
  <link rel="alternate" href="http://www.votresite.com" hreflang="en" />
  <link rel="alternate" href="http://www.votresite.com" hreflang="es" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <title>MyMovies</title>
</head>

<body>
  <noscript>il faut autoriser le javascript</noscript>
  <header>
    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">MyMovies</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-2">
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Contact</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
  </nav>
</body>