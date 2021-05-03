<?php
require('../app/app.php');
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../views/signin.php");
}

if (empty($_SESSION["cart"]) || !isset($_SESSION["cart"])) {
    echo "<script>alert('Opps Your Cart is Empty, shop now!'); location='katalog-product.php';</script>";
}
?>

<?php require('../partials/header.php'); ?>

<section class="row-cart">
    <div class="col-right">
        <?php
        $totalBeli = 0;
        foreach ($_SESSION["cart"] as $productId => $result) :
            $product = queryData("SELECT * FROM products WHERE id_product = '$productId'")[0];
            $totalHarga = $product["price_product"] * $result;
        ?>
            <div class="card-cart">
                <span style="float: right; font-weight: bold;">
                    <a href="../process/delete-cart.php?id=<?= $productId; ?>" style="text-decoration: none; color: #fff;">X</a>
                </span>
                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 12px;">
                    <h3><?= $product["name_product"]; ?></h3>
                    <a href="delete_keranjang.php?id=<?=$product['id_product']?>">X</a>
                    <span><?php date("Y-m-d h:m:s", strtotime($product["release_product"])); ?></span>
                </div>
                <h4>Rp <?= number_format($product["price_product"]); ?></h4>
                <h4><?= $product["desc_product"]; ?></h4>
                <h4><?= $result; ?> Stock</h4>
            </div>
            <?php $totalBeli += $totalHarga; ?>
        <?php endforeach; ?>
    </div>
    <div class="col-left">
        <h5>Total Price: Rp <?= number_format($totalBeli); ?></h5>
        <a href="checkout.php">Checkout Now!</a>
    </div>
</section>

<?php require('../partials/footer.php'); ?>