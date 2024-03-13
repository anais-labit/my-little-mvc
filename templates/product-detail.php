<!DOCTYPE html>
<html lang="">
<head>
    <title>Product Detail</title>
</head>
<body>
<h1>Product Detail</h1>
<div>
    <h2><?= htmlspecialchars($product['name'], ENT_QUOTES) ?></h2>
    <p><?= htmlspecialchars($product['description'], ENT_QUOTES) ?></p>
    <p>Prix: <?= htmlspecialchars($product['price'], ENT_QUOTES) ?> €</p>
</div>
</body>
</html>