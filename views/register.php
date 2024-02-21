<?php

require_once '../vendor/autoload.php';

use App\Controller\AuthenticationController;

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job05-Formulaire</title>
</head>

<body>
    <main>
        <h1>S'enregister</h1>
        <form id="form-register" action="" method="post" class="module-form">
            <div class="module-form">
                <label for="login">Entrer le login : </label>
                <input type="text" name="login" id="login" />
            </div>
            <div class="module-form">
                <label for="name">Entrer le nom : </label>
                <input type="text" name="fullname" id="fullname" />
            </div>
            <div class="module-form">
                <label for="email">Entrer le mail: </label>
                <input type="text" name="email" id="email" />
            </div>
            <div class="module-form">
                <label for="password">Mot de passe: </label>

                <input type="password" name="password" id="password" />
            </div>
            <div class="module-form">
                <label for="password">Vérifier le mot de passe: </label>
                <input type="password" name="password-check" id="password-check" />
            </div>
            <div class="module-form">
                <input class="submit" type="submit" value="Soumettre" />
            </div>
        </form>

        </section>
    </main>
</body>

</html>