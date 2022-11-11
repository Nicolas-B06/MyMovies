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
  <div>
    <h1 class="text-center">Dashboard</h1>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user) : ?>
                <tr>
                  <th scope="row"><?= $user->getId() ?></th>
                  <td><?= $user->getEmail() ?></td>
                  <td><?= $user->getRole() ?></td>
                  <td>
                    <a href="/admin/user/<?= $user->getId() ?>" class="btn btn-primary">Voir</a>
                    <a href="/admin/user/<?= $user->getId() ?>/delete" class="btn btn-danger">Supprimer</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</main>

<?php inc_footer(); ?>