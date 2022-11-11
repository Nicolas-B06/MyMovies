<?php inc_header("MyMovies - Contact",
  'Fusce scelerisque pellentesque consequat. Duis pharetra nibh magna, ac blandit tortor posuere rhoncus.'); ?>
<main class="mt-5 mb-5">
    <div class="container">
        <div class="container-wrap">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Nous contacter</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
                <div>
                    <p>Vous pouvez nous contacter par mail à l'adresse suivante : <a href="mailto:" class="text-decoration-none">
                        </a></p>

                </div>
                <div>
                    <p>Vous pouvez nous contacter par téléphone au : <a href="tel:" class="text-decoration-none">
                        </a></p>
                </div>
                <div>
                    <p>Vous pouvez nous contacter par courrier à l'adresse suivante : <a href="https://www.google.com/maps/place/" class="text-decoration-none">
                        </a></p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php inc_footer(); ?>