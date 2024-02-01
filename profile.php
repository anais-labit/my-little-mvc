<?php

require_once 'vendor/autoload.php';

use App\Controller\AuthenticationController;

session_start();

$user = new AuthenticationController;
$user->profile();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job08-Profile</title>
</head>

<body>
    <?php
    if ($user->profile()) { ?>
        <section>
            <h2>Profil</h2>
            <table>
                <thead>
                    <tr>
                        <th>Login</th>
                        <th>Fullname</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($_SESSION as $info) : ?>
                            <td><?= $info->getLogin(); ?></td>
                            <td><?= $info->getFullname(); ?></td>
                            <td><?= $info->getEmail(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    <?php
    }
    ?>
</body>

</html>