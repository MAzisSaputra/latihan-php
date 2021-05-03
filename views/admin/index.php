<?php
session_start();
require('../../app/app.php');

if (!isset($_SESSION["user"])) {
    header("Location: ../signin.php");
}

$products = queryData("SELECT * FROM products ORDER BY id_product ASC");
?>
<?php require('partials/header.php'); ?>
<div class="container">
    <h2>Entry Menu Product</h2>
    <h3>CRUD - History Order</h3>

    <div class="column-card">
        <?php foreach ($products as $product) : ?>
            <div class="card">
                <h3><?= $product["name_product"]; ?></h3>
                <div class="card-body">
                    <h4>Rp <?= number_format($product["price_product"]); ?></h4>
                    <span><?= $product["category_product"]; ?></span>
                </div>
                <span><?= $product["stock_product"]; ?> Stock</span>
                <p><?= $product["desc_product"]; ?></p>
                <a href="detail.php?id=<?= $product["id_product"]; ?>" class="btn-card">Read More >></a>
                <div class="card-footer">
                    <span><?= date("d-M-Y", strtotime($product["release_product"])); ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require('partials/footer.php'); ?>