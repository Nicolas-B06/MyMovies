<?php

namespace MyMovies;

require_once "./table/Table.php";
require_once "./model/Playlist.php";

class PlaylistTable extends Table
{
  protected $table = 'playlist';
  protected $class = Playlist::class;
}
