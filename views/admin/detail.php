<?php
session_start();
require('../../app/app.php');

$id = $_GET["id"];

$product = queryData("SELECT * FROM products WHERE id_product = '$id'")[0];

?>

<?php require('partials/header.php'); ?>

<div class="container">
    <div class="card-detail">
        <div class="card-header">
            <h3 class="text-card-detail"><?= $product["name_product"]; ?></h3>
            <a href="../../process/delete.php?id=<?= $product['id_product']; ?>">X</a>
        </div>
        <div class="card-body">
            <h4>Rp <?= number_format($product["price_product"]); ?></h4>
            <span><?= $product["category_product"]; ?></span>
        </div>
        <span><?= $product["stock_product"]; ?> Stock</span>
        <p><?= $product["desc_product"]; ?></p>
    </div>
    <a href="edit.php?id=<?= $product['id_product']; ?>">Edit</a>
    <a href="index.php">Go Back Home</a>
</div>
<?php require('partials/footer.php'); ?>