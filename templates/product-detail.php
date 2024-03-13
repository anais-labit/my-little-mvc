<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Product Detail</title>
    <link rel="stylesheet" href="/pwd/public/assets/css/style.css">
</head>
<body>
<header>
    <h1>Product Detail</h1>
</header>
<div class="content product-details">
    <h2><?= htmlspecialchars($product['name'], ENT_QUOTES) ?></h2>
    <p><?= htmlspecialchars($product['description'], ENT_QUOTES) ?></p>
    <p class="product-price">Price: <?= htmlspecialchars($product['price'], ENT_QUOTES) ?> €</p>
</div>
</body>
</html>