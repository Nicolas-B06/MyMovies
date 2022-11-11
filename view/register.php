<?php include './includes/header.php' ?>

<div class="d-flex justify-content-center">
    <div class="card w-50 ">
        <h5 class="card-header text-center">Inscription</h5>
        <div class="card-body">
            <form action="/register" method="post">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Name">

                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">

                <label for="password" class=" col-form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">

                <button type="submit" class="btn btn-primary mt-3">Connexion</button>
            </form>
        </div>
        <p class="card-footer text-center">Vous avez déjà un compte ? <a href="/login" class="">Connectez vous</a></p>
    </div>
</div>

<?php include './includes/footer.php' ?>