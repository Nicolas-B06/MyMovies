<?php
require_once __DIR__ . '/router.php';

get('/', 'pages/accueil');
get('/login', 'pages/inscription');

// any('/404', 'pages/404.php');
