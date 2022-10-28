<?php

include 'index.php';

?>

<main>
    <div class="d-flex justify-content-center">
    <div class="card w-50 ">
        <h5 class="card-header text-center">Connexion</h5>
        <div class="card-body">
            <div class="mb-3 row">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class=" col-form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword">
            </div>
        </div>
        <div class="card-footer text-center">
            <a><button type="button" class="btn btn-primary">Connexion</button></a>
            <p>Vous n'avez pas de compte ? <a href="" class="">Inscrivez-vous</a></p>
        </div>
    </div>
    </div>
</main>


<?php

include './includes/footer.php';

?>