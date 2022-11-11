<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\MovieAPI;
use MyMovies\UserModel;
use MyMovies\PlaylistModel;

// All imports here
require_once './functions.php';
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

get('/', '/view/movies');
get('/login', 'view/login');

post('/login', function () {
  Auth::login($_POST['email'], $_POST['password']);
},);

get('/logout', function () {
  Auth::logout();
});

get('/register', 'view/register');

post('/register', function () {
  Auth::register($_POST);
});

get('/movie', 'view/movies');
post('/movie', 'view/movies');
get('/movie/$id', 'view/movie');

get('/playlist/$playlistId/addMovie/$movieId', function ($playlistId, $movieId) {

  $playlistModel = new PlaylistModel(Connection::getPDO());
  $movieApi = new MovieAPI();
  $movie = $movieApi->find($movieId);

  $playlistModel->addMovieId($playlistId, $movie->getId(), $movie->getRuntime());
  header("Location: /movie/$movieId");
});

// USER
get('/user', 'view/profile/myAccount');
get('/playlist', 'view/profile/myPlaylists');
get('/playlist/create', 'view/profile/playlistForm');
get('/playlist/$playlistId', 'view/profile/myPlaylist');

get('/playlist/$playlistId/delete', function ($playlistId) {
  $playlistModel = new PlaylistModel(Connection::getPDO());
  $playlistModel->delete($playlistId);
  header("Location: /playlist");
});

post('/playlist', function () {
  $data = $_POST;
  $data['userId'] = Auth::id();
  $playlistModel = new PlaylistModel(Connection::getPDO());
  $id = $playlistModel->create($data);
  header("Location: /playlist/$id");
});

get('/playlist/$playlistId/movie/$movieId/delete', function ($playlistId, $movieId) {
  $movieApi = new MovieAPI();
  $movie = $movieApi->find($movieId);

  $playlistModel = new PlaylistModel(Connection::getPDO());
  $playlistModel->removeMovieId($playlistId, $movie->getId(), $movie->getRuntime());
  header("Location: /playlist");
});
get('/user', 'view/profile/myAccount');
get('/user/playlist/$playlistId', 'view/profile/myPlaylist');

// legal mentions
get('/legal', 'view/legal');

// contact
get('/contact', 'view/contact');

// about
get('/about', 'view/about');

// ADMIN

get('/admin', 'view/admin/dashboard');
get('/admin/user/$userId', 'view/admin/user');
get('/admin/user/$userId/playlist/$playlistId', 'view/admin/playlist');

get('/admin/user/$userId/delete', function ($userId) {
  $userModel = new UserModel(Connection::getPDO());
  $userModel->delete($userId);
  header("Location: /admin");
});

get('/admin/user/$userId/playlist/$playlistId/delete', function ($userId, $playlistId) {
  $playlistModel = new PlaylistModel(Connection::getPDO());
  $playlistModel->delete($playlistId);
  header("Location: /admin/user/$userId");
});

// ERRORS

any('/404', 'view/error');
