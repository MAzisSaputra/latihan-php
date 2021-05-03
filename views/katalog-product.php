<?php
require('../app/app.php');
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: signin.php");
}

$products = queryData("SELECT * FROM products ORDER BY id_product ASC");

?>

<?php require('../partials/header.php'); ?>
<div class="container">
    <div class="column-card">
        <?php foreach ($products as $product) { ?>
            <a href="detail-product.php?id=<?= $product["id_product"]; ?>" style="text-decoration: none; color: #fff;">
                <div class="card-katalog">
                    <h4><?= $product["name_product"]; ?></h4>
                    <div style="display: flex; justify-content: space-between;">
                        <h5>Rp <?= number_format($product["price_product"]); ?></h5>
                        <h5><?= $product["category_product"]; ?></h5>
                        <h5><?= $product["stock_product"]; ?> Stock </h5>
                    </div>
                    <p><?= $product["desc_product"]; ?></p>
                </div>
            </a>
        <?php } ?>
    </div>
</div>
<?php require('../partials/footer.php'); ?>