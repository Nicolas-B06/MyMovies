<?php

require_once './class/Playlist.php';

$playlist = new Playlist();
$playlist->fetch(5);
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>MyMovies</title>
</head>
<body>
<noscript>il faut autoriser le javascript</noscript>

<header>
    <nav></nav>
  </header>
  <?php
  
  echo $playlist->getName();
  
