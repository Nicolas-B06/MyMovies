<?php
require_once __DIR__ . '/router.php';

get('/', 'pages/accueil');
get('/login', 'pages/inscription');

// ADMIN
get('/admin/user/$userId/playlist', 'view/admin/playlists');
get('/admin/user/$userId/playlist/$playlistId', 'view/admin/playlist');

// any('/404', 'pages/404.php');
