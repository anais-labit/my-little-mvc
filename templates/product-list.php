<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link rel="stylesheet" href="/pwd/public/assets/css/style.css">
</head>
<body>
<header>
    <h1>Product List</h1>
</header>
<div class="content">
    <ul class="products-list">
        <?php foreach ($products as $product): ?>
            <li class="product-item">
                <h2><?= htmlspecialchars($product['name'], ENT_QUOTES) ?></h2>
                <p><?= htmlspecialchars($product['description'], ENT_QUOTES) ?></p>
                <p class="product-price">Price: <?= htmlspecialchars($product['price'], ENT_QUOTES) ?> €</p>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
