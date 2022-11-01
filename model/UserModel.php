<?php

namespace MyMovies;

use MyMovies\User;

require_once "./model/Model.php";
require_once "./class/User.php";

final class UserModel extends Model
{
  protected $table = 'user';
  protected $class = User::class;
}
