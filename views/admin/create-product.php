<?php
session_start();
require('../../app/app.php');

if (!isset($_SESSION["user"])) {
    header("Location: ../signin.php");
}

?>
<?php require('partials/header.php'); ?>
<section>
    <div class="container">
        <h2>Form Create a Product</h2>
        <form action="../../process/create-product.php" method="post">
            <div>
                <label for="name_product">Name Product</label>
                <input type="text" name="name_product" id="name_product" placeholder="Laptop Macbook Air 2021">
            </div>
            <div>
                <label for="price_product">Price Product</label>
                <input type="text" name="price_product" id="price_product" placeholder="4600000">
            </div>
            <div>
                <label for="category_product">Category Product</label>
                <input type="text" name="category_product" id="category_product" placeholder="Elektronik">
            </div>
            <div>
                <label for="stock_product">Stock Product</label>
                <input type="text" name="stock_product" id="stock_product" placeholder="5 Stock">
            </div>
            <div>
                <label for="desc_product">Description Product</label>
                <input type="text" name="desc_product" id="desc_product" placeholder="this product available!">
            </div>
            <button type="submit" name="createProduct">Create Product</button>
        </form>
    </div>
</section>
<?php require('partials/footer.php'); ?>