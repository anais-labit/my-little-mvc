<?php

require_once '../pwd/vendor/autoload.php';

use App\Models\Clothing;
use App\Models\Electronic;
use App\Controllers\Router;

$router = new Router('/plateforme/pwd');

$id_product = null;
$product_type = null;

$path = $_SERVER['REQUEST_URI'];
$parts = explode('/', rtrim($path, '/'));

if ($parts[3] === 'product') {
    $product_type = $parts[4];
    $id_product = $parts[5];
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
        <h1>Le produit</h1>
        <section class="mt-4">
            <?php if ($id_product !== null && $product_type !== null) :
                if ($product_type === 'clothing') :
                    $clothing = new Clothing();
                    $product = $clothing->findOneById($id_product);
                elseif ($product_type === 'electronic') :
                    $electronic = new Electronic();
                    $product = $electronic->findOneById($id_product);
                endif; ?>

                <?php if ($product) : ?>
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title"><?= $product->getName(); ?></h2>
                            <h3 class="card-subtitle mb-2 text-muted"><?= $product->getPrice(); ?> €</h3>
                            <p class="card-text"><?= $product->getDescription(); ?></p>
                            <p class="card-text">Stock: <?= $product->getQuantity(); ?></p>
                            <?php if ($product_type === 'clothing') : ?>
                                <p class="card-text">Taille: <?= $product->getSize(); ?></p>
                                <p class="card-text">Couleur: <?= $product->getcolor(); ?></p>
                            <?php elseif ($product_type === 'electronic') : ?>
                                <p class="card-text">Marque: <?= $product->getBrand(); ?></p>
                                <p class="card-text">Frais de garantie: <?= $product->getWarantyFee(); ?> €</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else : ?>
                    <h2>Le produit demandé n'est pas disponible</h2>
                <?php endif; ?>
            <?php else : ?>
                <h2>Le produit demandé n'est pas disponible</h2>
            <?php endif; ?>
        </section>
    </main>
    <?php include '../pwd/ressources/includes/footer.php'; ?>
</body>

</html>