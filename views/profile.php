<?php

require_once '../vendor/autoload.php';

use App\Controller\AuthenticationController;

session_start();

$user = new AuthenticationController;
$user->profile();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user->updateProfile();
    // var_dump($_SESSION);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job08-Profile</title>
</head>

<body>


    <main>
        <h1>Profil</h1>
        <form id="form-update" action="" method="POST" class="module-form">
            <?php foreach ($_SESSION as $info) :
            ?>
                <div class="module-form">
                    <div class="module-form">
                        <label for="email">Mail: </label>
                        <input type="text" name="email" id="email" value="<?= $info->getEmail(); ?>" readonly="readonly" />
                    </div>
                    <label for="login">Entrer le login : </label>
                    <input type="text" name="login" id="login" value="<?= $info->getLogin(); ?>" />
                </div>
                <div class="module-form">
                    <label for="name">Entrer le nom : </label>
                    <input type="text" name="fullname" id="fullname" value="<?= $info->getFullname(); ?>" />
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
            <?php endforeach; ?>

        </form>

        </section>
    </main>

</body>

</html>