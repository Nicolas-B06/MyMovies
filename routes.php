<?php

use MyMovies\Connection;
use MyMovies\PlaylistModel;

require_once './class/Connection.php';
require_once './model/PlaylistModel.php';

require_once __DIR__ . '/router.php';

get('/', 'pages/accueil');
get('/login', 'pages/accueil');
get('/register', 'pages/inscription');

// ADMIN
get('/admin', 'view/admin/dashboard');
get('/admin/user/$userId/delete', function ($userId) {
  // TODO
  header("Location: /admin/user");
});
get('/admin/user/$userId/playlist', 'view/admin/playlists');
get('/admin/user/$userId/playlist/$playlistId', 'view/admin/playlist');
get('/admin/user/$userId/playlist/$playlistId/delete', function ($userId, $playlistId) {
  $playlistModel = new PlaylistModel(Connection::getPDO());
  $playlistModel->delete($playlistId);
  header("Location: /admin/user/$userId/playlist");
});

// any('/error', 'view/error');
