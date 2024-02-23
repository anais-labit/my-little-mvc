<?php

require_once '../pwd/vendor/autoload.php';

use App\Models\Clothing;
use App\Models\Electronic;
use App\Controllers\Router;

$clothing = new Clothing();
$clothes = $clothing->findAll();
$electronic = new Electronic();
$electronics = $electronic->findAll();

$router = new Router('/plateforme/pwd');
// function navigateToPage($arg)
// {
//     $router->setPage($arg);
// }
// bon courage
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include '../pwd/ressources/includes/header.php'; ?>
    <main class="container mt-5">
        <h1 class="mb-4">Tous les produits</h1>
        <section>
            <h2>Liste des vêtements</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Taille</th>
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clothes as $clothe) :
                            // $router->addRoute('GET', '/product/clothing/ ' . $clothe->getId(), function () {
                            //     require './ressources/views/product.php';
                            // });
                            // $page = $this->page = '/product/clothing/';
                            // $productUrl = $page . $clothe->getId();

                            $productUrl = "/plateforme/pwd/product/clothing/" . $clothe->getId();
                        ?>
                            <tr>
                                <td><?= $clothe->getName(); ?></td>
                                <td><?= $clothe->getDescription(); ?></td>
                                <td><?= $clothe->getPrice(); ?> €</td>
                                <td><?= $clothe->getSize(); ?></td>
                                <td><?= $clothe->getColor(); ?></td>
                                <td>
                                    <a href="<?= $productUrl ?>" class="btn btn-primary">Voir +</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section>
            <h2>Liste des produits électroniques</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Garantie</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($electronics as $electronic) :
                            $productUrl = "http://localhost/plateforme/pwd/product/electronic/" . $electronic->getId();
                        ?>
                            <tr>
                                <td><?= $electronic->getName(); ?></td>
                                <td><?= $electronic->getDescription(); ?></td>
                                <td><?= $electronic->getPrice(); ?> €</td>
                                <td><?= $electronic->getWarantyFee(); ?> €</td>
                                <td>
                                    <a href="<?= $productUrl ?>" class="btn btn-primary">Voir +</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <?php include '../pwd/ressources/includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>