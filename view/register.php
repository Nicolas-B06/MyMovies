<?php inc_header('Inscription', "C'est la page de l'inscription"); ?>

<main class="my-5">
    <div class="container">
        <div class="card">
            <h1 class="card-header text-center">Inscription</h1>
            <div class="card-body">
                <form action="/register" method="post">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name">

                    <label for="email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">

                    <label for="password" class=" col-form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password">

                    <button type="submit" class="btn btn-primary mt-3">Inscription</button>
                </form>
            </div>
            <p class="card-footer text-center mt-3">Vous avez déjà un compte ? <a href="/login">Connectez vous</a></p>
        </div>
    </div>
</main>

<?php inc_footer(); ?>