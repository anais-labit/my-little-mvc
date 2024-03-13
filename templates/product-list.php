<!DOCTYPE html>
<html lang="">
<head>
    <title>Product List</title>
</head>
<body>
<h1>Product List</h1>
<ul>
    <?php
    $products = $products ?? [];
    foreach ($products as $product): ?>
        <div>
            <h2><?= htmlspecialchars($product['name'], ENT_QUOTES) ?></h2>
            <p><?= htmlspecialchars($product['description'], ENT_QUOTES) ?></p>
            <p>Prix: <?= htmlspecialchars($product['price'], ENT_QUOTES) ?> €</p>
        </div>
    <?php endforeach; ?>
</ul>
</body>
</html>