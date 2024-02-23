<?php

require_once '../pwd/vendor/autoload.php';

use App\Controllers\AuthenticationController;

session_start();

$user = new AuthenticationController;
$user->profile();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->updateProfile();
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
        <h1 class="mb-4">Profil</h1>
        <form id="form-update" action="" method="POST" class="row g-3">
            <?php 
            foreach ($_SESSION as $info) : ?>
                <div class="col-md-6">
                    <label for="email" class="form-label">Mail</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $info->getEmail(); ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" class="form-control" id="login" name="login" value="<?= $info->getLogin(); ?>">
                </div>
                <div class="col-12">
                    <label for="fullname" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $info->getFullname(); ?>">
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-12">
                    <label for="password-check" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="password-check" name="password-check">
                </div>
            <?php endforeach; ?>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </main>
    <?php include '../pwd/ressources/includes/footer.php'; ?>
</body>

</html>