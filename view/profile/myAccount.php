<?php

use MyMovies\Auth;
use MyMovies\Connection;
use MyMovies\PlaylistModel;
use MyMovies\UserModel;

Auth::check();

$userId = Auth::id();
$userModel = new UserModel(Connection::getPDO());
$user = $userModel->find($userId);

$playlistModel = new PlaylistModel(Connection::getPDO());
$playlists = $playlistModel->findByUserId($userId);

inc_header("MyMovies - Mon Compte",
'Fusce scelerisque pellentesque consequat. Duis pharetra nibh magna, ac blandit tortor posuere rhoncus.'); ?>
<main class="my-5">
    <div class="container">
        <div class="container-wrap">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Mon Compte</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-5">
                                    <div class="card-header">
                                        <h3 class="card-title
                                        ">Mes informations</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group
                                                ">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?= $user->getEmail() ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Nom</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user->getName() ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center">
                                                <a href="/user/delete" class="btn btn-danger mt-3">Supprimer mon compte</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Mes playlists</h2>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($playlists as $playlist) : ?>
                                            <tr>
                                                <th scope="row"><?= $playlist->getId() ?></th>
                                                <td><?= htmlspecialchars($playlist->getName()) ?></td>
                                                <td>
                                                    <a href="<?= "/playlist/" . htmlspecialchars($playlist->getId()) ?>" class="btn btn-primary">Voir</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<?php inc_footer(); ?>