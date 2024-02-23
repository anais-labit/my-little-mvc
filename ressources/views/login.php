<?php

require_once '../pwd/vendor/autoload.php';

use App\Controllers\AuthenticationController;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $user = new AuthenticationController();
    $user->login();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include '../pwd/ressources/includes/head.php'; ?>
</head>

<body>
    <?php include '../pwd/ressources/includes/header.php'; ?>
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Se connecter</h1>
                        <form id="form-register" action="" method="post">
                            <div class="form-group">
                                <label for="email">Entrer le mail:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Connexion</button>
                            </div>
                        </form>
                        <p class="text-center mb-0">Pas encore de compte ? <a href="register">Inscrivez-vous ici</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include '../pwd/ressources/includes/footer.php'; ?>
</body>

</html>