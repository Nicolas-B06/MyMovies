<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\UserModel;

Auth::admin();

$userModel = new UserModel(Connection::getPDO());
$users = $userModel->all();

?>

<?php inc_header(); ?>
<main class="my-5">
  <?php foreach ($users as $user) : ?>
    <div>
      <div><?= htmlspecialchars($user->getName()) ?></div>
      <a href="<?= "/admin/user/" . htmlspecialchars($user->getId()) ?>">Voir profil</a>
    </div>
  <?php endforeach ?>
</main>

<?php inc_footer(); ?>