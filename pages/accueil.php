<?php include './includes/header.php';

?>

<main>
    <div class="d-flex justify-content-center">
        <div class="card w-50 ">
            <h5 class="card-header text-center">Connexion</h5>
            <div class="card-body">

                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">


                <label for="inputPassword" class=" col-form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword">

            </div>
            <div class="card-footer text-center">
                <a><button type="button" class="btn btn-primary">Connexion</button></a>
                <p>Vous n'avez pas de compte ? <a href="" class="">Inscrivez-vous</a></p>
            </div>
        </div>
    </div>
</main>

<?php include './includes/footer.php'; ?>