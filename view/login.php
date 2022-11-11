<main>
    <div class="container">
        <div class="card">
            <h1 class="card-header text-center">Connexion</h1>
            <div class="card-body">
                <form action="/login" method="post">
                    <label for="email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    <p class="card-footer text-center">Vous n'avez pas de compte ? <a href="/register">Inscrivez-vous</a></p>
            </div>
        </div>
</main>

<?php include './includes/footer.php'; ?>