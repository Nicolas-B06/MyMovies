<?php

namespace MyMovies;

require_once "./model/Model.php";
require_once "./class/Playlist.php";

class PlaylistModel extends Model
{
  protected $table = 'playlist';
  protected $class = Playlist::class;
}
