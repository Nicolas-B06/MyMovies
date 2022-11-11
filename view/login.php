<?php

include './includes/header.php';
?>


<div class="d-flex justify-content-center">
    <div class="card w-50 ">
        <h5 class="card-header text-center">Connexion</h5>
        <div class="card-body">
            <form action="/login" method="post">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">

                <label for="password" class=" col-form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">

                <button type="submit" class="btn btn-primary mt-3">Connexion</button>
            </form>
        </div>
        <p class="card-footer text-center">Vous n'avez pas de compte ? <a href="/register" class="">Inscrivez-vous</a></p>
    </div>
</div>


<?php include './includes/footer.php'; ?>