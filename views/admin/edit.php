<?php
session_start();
require('../../app/app.php');

if (!isset($_SESSION["user"])) {
    header("Location: ../signin.php");
}

$id = $_GET["id"];

$product = queryData("SELECT * FROM products WHERE id_product = '$id'")[0];

if (isset($_POST["editProduct"])) {
    if (editProduct($_POST, $id) > 0) {
        echo "<script>alert('Product has been edited!'); location='../admin/index.php';</script>";
    } else {
        echo mysqli_error($dbapp);
        // echo "<script>alert('Product has been created!'); location='../views/admin/index.php';</script>";
    }
}

?>
<?php require('partials/header.php'); ?>
<section>
    <div class="container">
        <h2>Form Edit a Product</h2>
        <form method="post">
            <div>
                <label for="name_product">Name Product</label>
                <input type="text" name="name_product" id="name_product" placeholder="Laptop Macbook Air 2021" value="<?= $product['name_product']; ?>">
            </div>
            <div>
                <label for="price_product">Price Product</label>
                <input type="text" name="price_product" id="price_product" placeholder="4600000" value="<?= $product["price_product"]; ?>">
            </div>
            <div>
                <label for="category_product">Category Product</label>
                <input type="text" name="category_product" id="category_product" placeholder="Elektronik" value="<?= $product["category_product"]; ?>">
            </div>
            <div>
                <label for="stock_product">Stock Product</label>
                <input type="text" name="stock_product" id="stock_product" placeholder="5 Stock" value="<?= $product["stock_product"]; ?>">
            </div>
            <div>
                <label for="desc_product">Description Product</label>
                <input type="text" name="desc_product" id="desc_product" placeholder="this product available!" value="<?= $product["desc_product"]; ?>">
            </div>
            <button type="submit" name="editProduct">Edit Product</button>
        </form>
    </div>
</section>
<?php require('partials/footer.php'); ?>