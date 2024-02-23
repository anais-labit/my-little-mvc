<?php
require_once '../pwd/vendor/autoload.php';

use App\Controllers\AuthenticationController;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = htmlspecialchars($_POST['login']);
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $passwordCheck = htmlspecialchars($_POST['password-check']);

    $user = new AuthenticationController();
    $user->register($login, $email, $password, $fullname);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include '../pwd/ressources/includes/head.php'; ?>
</head>

<body>
    <?php
    include '../pwd/ressources/includes/header.php'; ?>
    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">S'enregister</h1>
                        <form id="form-register" method="post">
                            <div class="form-group">
                                <label for="login">Entrez le login :</label>
                                <input type="text" class="form-control" id="login" name="login">
                            </div>
                            <div class="form-group">
                                <label for="fullname">Entrez le nom :</label>
                                <input type="text" class="form-control" id="fullname" name="fullname">
                            </div>
                            <div class="form-group">
                                <label for="email">Entrez le mail :</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe :</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password-check">Vérifiez le mot de passe :</label>
                                <input type="password" class="form-control" id="password-check" name="password-check">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Inscription</button>
                            </div>
                        </form>
                        <p class="text-center mb-0">Déjà un compte ? <a href="login">Connectez-vous ici</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include '../pwd/ressources/includes/footer.php'; ?>
</body>

</html>