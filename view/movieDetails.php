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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>MyMovies</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <noscript>il faut autoriser le javascript</noscript>
    <header>
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
    <main class="mt-5 mb-5">
        <div class="container">
            <div class="container-wrap">
                <div class="row">
                    <div class="col-12">
                        <h3>23 Janvier 2017</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <img src="http://res.cloudinary.com/ds5sqpkiz/image/upload/c_scale,h_600,w_500/v1517280184/get-out_1481570504_i5dlu2.jpg" />
                    </div>
                    <div class="col-md-6 col-xs-12 text-center">
                        <h1>Get Out</h1>
                        <a href="https://www.youtube.com/watch?v=sRfnevzM9kQ">Preview Movie</a>
                        <p>Get Out was... AMAZING! It's hard to talk about the movie without giving away the entire plot, but I can say that it's defintely a movie worth watching. It's a phsycological thriller about a black man and his white girlfriend, who go to the girl's parents house for the weekend. All I can say is after that some seriously crazy stuff goes down. I watched the movie with a group of friends (very much recommmended to watch with friends) and every 15 minutes we would pause and guess what would happen at the end. One of the most well-done movies I've watched in while. Be prepared to be scared and creeped out. </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <footer class="mt-auto bg-dark">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Mentions légales</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-white">A propos</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Contact</a></li>
        </ul>
        <p class="text-center text-muted">© 2022 MyMovies, Inc</p>
    </footer>
</body>

</html>