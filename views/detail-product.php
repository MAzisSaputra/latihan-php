<?php
require('../app/app.php');
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: signin.php");
}

$id = $_GET["id"];
$product = queryData("SELECT * FROM products WHERE id_product = $id")[0];

if (isset($_POST["buyProduct"])) {
    $totalProduct = $_POST["total"];
    $_SESSION["cart"][$id] = $totalProduct;
    echo "<script>alert('this product has been add to cart!'); location='cart.php';</script>";
}

?>

<?php require('../partials/header.php'); ?>
<div class="container">
    <div class="card-katalog">
        <h4><?= $product["name_product"]; ?></h4>
        <div style="display: flex; justify-content: space-between;">
            <h3>Rp <?= number_format($product["price_product"]); ?></h3>
            <h3><?= $product["category_product"]; ?></h3>
            <h3><?= $product["stock_product"]; ?> Stock </h3>
        </div>
        <p><?= $product["desc_product"]; ?></p>
    </div>
    <form method="post">
        <div style="padding: 5px;">
            <label for="">how many do you want to buy?</label>
            <input type="number" name="total" id="total" class="form-input" value="1" min="1" max="<?= $product["stock_product"]; ?>" placeholder="1">
            <button type="submit" name="buyProduct">Buy Now</button>
        </div>
    </form>
</div>
<?php require('../partials/footer.php'); ?>