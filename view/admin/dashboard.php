<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\UserModel;

require_once "./class/Auth.php";
require_once "./class/Connection.php";

require_once './model/UserModel.php';

Auth::admin();

$userModel = new UserModel(Connection::getPDO());
$users = $userModel->all();

?>

<!-- Header -->

<?php foreach ($users as $user) : ?>
  <div>
    <div><?= htmlspecialchars($user->getName()) ?></div>
    <a href="<?= "/admin/user/" . htmlspecialchars($user->getId()) ?>">Voir profil</a>
  </div>
<?php endforeach ?>

<!-- Footer -->