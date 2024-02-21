<?php

require_once '../vendor/autoload.php';

use App\Controller\AuthenticationController;
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job05-Formulaire</title>
</head>

<body>
    <main>
        <h1>Se connecter</h1>
        <form id="form-register" action="" method="post" class="module-form">

            <div class="module-form">
                <label for="email">Entrer le mail: </label>
                <input type="text" name="email" id="email" />
            </div>
            <div class="module-form">
                <label for="password">Mot de passe: </label>

                <input type="password" name="password" id="password" />
            </div>

            <div class="module-form">
                <input class="submit" type="submit" value="Soumettre" />
            </div>
        </form>

        </section>
    </main>
</body>

</html>