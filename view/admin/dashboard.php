<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\UserModel;

Auth::admin();

$userModel = new UserModel(Connection::getPDO());
$users = $userModel->all();

?>

<!-- Header -->
<header>
    <h1>Administration</h1>
    <nav>
        <a href="/admin">Dashboard</a>
        <a href="/admin/user">Utilisateurs</a>
        <a href="/admin/playlist">Playlists</a>
        <a href="/admin/movie">Films</a>
    </nav>
    <div>
        <a href="/logout">Déconnexion</a>
    </div>
</header>

<?php foreach ($users as $user) : ?>
  <div>
    <div><?= htmlspecialchars($user->getName()) ?></div>
    <a href="<?= "/admin/user/" . htmlspecialchars($user->getId()) ?>">Voir profil</a>
  </div>
<?php endforeach ?>

<footer>
    <a href="">Mentions légales</a>
    <p>MyMovies &copy; 2021</p>
</footer>
<!-- Footer -->