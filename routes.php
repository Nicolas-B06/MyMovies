<?php

use MyMovies\Auth;
use MyMovies\Connection;

use MyMovies\UserModel;
use MyMovies\PlaylistModel;

// All imports here
require_once './class/Connection.php';
require_once './class/Auth.php';
require_once './model/Model.php';
require_once './api/API.php';

require_once './model/UserModel.php';
require_once './model/PlaylistModel.php';
require_once './api/MovieAPI.php';

require_once './class/User.php';
require_once './class/Playlist.php';
require_once './class/Movie.php';

require_once __DIR__ . '/router.php';

get('/', 'pages/accueil');

get('/login', 'pages/accueil');
post('/login', function () {
  Auth::login($_POST['email'], $_POST['password']);
});

get('/register', 'pages/inscription');

// ADMIN

get('/admin', 'view/admin/dashboard');

get('/admin/user/$userId', 'view/admin/user');

get('/admin/user/$userId/delete', function ($userId) {
  $userModel = new UserModel(Connection::getPDO());
  $userModel->delete($userId);
  header("Location: /admin");
});

get('/admin/user/$userId/playlist/$playlistId', 'view/admin/playlist');

get('/admin/user/$userId/playlist/$playlistId/delete', function ($userId, $playlistId) {
  $playlistModel = new PlaylistModel(Connection::getPDO());
  $playlistModel->delete($playlistId);
  header("Location: /admin/user/$userId");
});

// ERRORS

any('/404', 'view/error');
