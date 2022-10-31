<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\PlaylistModel;

require_once "./class/Auth.php";
require_once "./class/Connection.php";
require_once "./model/PlaylistModel.php";

// Auth::check(1);

$playlistModel = new PlaylistModel(Connection::getPDO());
$playlists = $playlistModel->findByUserId($userId);
