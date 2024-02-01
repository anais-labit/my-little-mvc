<?php

require_once 'vendor/autoload.php';

use App\Model\Clothing;
use App\Model\Electronic;

// $clothing = new Clothing();
// $clothes = $clothing->findAll();
// $electronic = new Electronic();
// $electronics = $electronic->findAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job03-Page Product</title>
</head>

<body>
    <main>
        <h1>Le produit</h1>
        <section>
            <?php
            if (!empty($_GET['id_product']) && !(empty($_GET['product_type']))) {
                $id_product = $_GET['id_product'];
                if ($_GET['product_type'] === 'clothing') {
                    $clothing = new Clothing();
                    $clothes = $clothing->findOneById($id_product);
            ?>
                    <h1><?= $clothes->getName(); ?></h1>
                    <h2><?= $clothes->getPrice(); ?> €</h2>
                    <h2><?= $clothes->getDescription(); ?></h2>
                    <h2><?= $clothes->getQuantity(); ?> en stock</h2>
                    <h2><?= $clothes->getSize(); ?></h2>
                    <h2><?= $clothes->getcolor(); ?></h2>
                <?php
                }
                if ($_GET['product_type'] === 'electronic') {
                    $electronic = new Electronic();
                    $electronics = $electronic->findOneById($id_product);
                ?>
                    <h1><?= $electronics->getName(); ?></h1>
                    <h2><?= $electronics->getPrice(); ?> €</h2>
                    <h2><?= $electronics->getDescription(); ?></h2>
                    <h2><?= $electronics->getQuantity(); ?> en stock</h2>
                    <h2><?= $electronics->getBrand(); ?></h2>
                    <h2><?= $electronics->getWarantyFee(); ?></h2>
                <?php
                }
                ?>

            <?php
            } else {
            ?>
                <h1>Le produit demandé n'est pas disponible</h1>
            <?php
            }
            ?>
            <!-- http://localhost/my-little-mvc/product.php?id_product=1&product_type=%22clothing%22 -->
        </section>
        </table>
        </section>
    </main>
</body>

</html>