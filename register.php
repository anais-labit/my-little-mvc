<?php

require_once 'vendor/autoload.php';

use App\Model\Clothing;
use App\Model\Electronic;
use App\Model\User;
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
                <input type="text" name="login" id="login" required />
            </div>
            <div class="module-form">
                <label for="name">Entrer le nom : </label>
                <input type="text" name="name" id="name" required />
            </div>
            <div class="module-form">
                <label for="email">Entrer le mail: </label>
                <input type="text" name="email" id="email" required />
            </div>
            <div class="module-form">
                <label for="password">Mot de passe: </label>

                <input type="password" name="password" id="password" required />
            </div>
            <div class="module-form">
                <label for="password">Vérifier le mot de passe: </label>
                <input type="password" name="password-check" id="password-check" required />
            </div>
            <div class="module-form">
                <input class="submit" type="submit" value="Soumettre" />
            </div>
        </form>

        </section>
    </main>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = htmlspecialchars($_POST['login']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $passwordCheck = htmlspecialchars($_POST['password-check']);
    $role=['ROLE_USER'];

    $new_user = new User(NULL,$login, $name, $email, $password,  $role);
    $productCreate=$new_user->create();
// var_dump($productCreate);
  }
?>