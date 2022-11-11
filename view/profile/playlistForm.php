
<?php

use MyMovies\Auth;

Auth::check();

inc_header("MyMovies - Créer une playlist",
  'Fusce scelerisque pellentesque consequat. Duis pharetra nibh magna, ac blandit tortor posuere rhoncus.'); ?>

<main class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-column">
                <h1 class="text-center mt-2">Créer une playlist</h1>
                <form class="d-flex flex-column align-items-center mt-5 mb-5" action="/playlist" method="post">
                    <div class="mb-3 w-25">
                        <label for="name" class="form-label">Nom de la playlist</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la playlist">
                    </div>
                    <div class="mb-3 w-25">
                        <label for="private" class="form-label">Playlist privée</label>
                        <select class="form-select" aria-label="Default select example" id="private" name="isPrivate">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>
                    <div class="mr-2">
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php inc_footer(); ?>