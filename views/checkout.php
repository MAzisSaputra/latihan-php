<?php
require('../app/app.php');
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../views/signin.php");
}

if (empty($_SESSION["cart"]) || !isset($_SESSION["cart"])) {
    echo "<script>alert('Opps Your Cart is Empty, shop now!'); location='katalog-product.php';</script>";
}
$id_user = $_SESSION["id_user"];



?>

<?php require('../partials/header.php'); ?>

<section>
    <div class="row-cart">
        <div class="col-right">
            <?php
            $totalBeli = 0;
            foreach ($_SESSION["cart"] as $cartId => $result) :
                $product = queryData("SELECT * FROM products WHERE id_product = '$cartId'")[0];
                $totalHarga = $product["price_product"] * $result;
                $totalBeli += $totalHarga;
            ?>
                <div class="card-cart">
                    <span style="float: right; font-weight: bold;">
                        <a href="../process/delete-cart.php?id=<?= $productId; ?>" style="text-decoration: none; color: #fff;">X</a>
                    </span>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 12px;">
                        <h3><?= $product["name_product"]; ?></h3>
                        <span><?php date("Y-m-d h:m:s", strtotime($product["release_product"])); ?></span>
                    </div>
                    <h4>Rp <?= number_format($product["price_product"]); ?></h4>
                    <h4><?= $product["desc_product"]; ?></h4>
                    <h4><?= $result; ?> Stock</h4>
                </div>
                <h2>Total Price Your Items: Rp <?= number_format($totalBeli); ?></h2>
            <?php endforeach; ?>
        </div>
        <div class="col-left">
            <h3>Finish the payment now!</h3>
            <form method="post">
                <div>
                    <label for="user">Name Buyyer</label>
                    <input type="text" name="name_user" id="name_user" value="<?= $_SESSION["full_name"]; ?>">
                </div>
                <div>
                    <label for="name_product">Name Product</label>
                    <input type="text" name="name_product" id="name_product" value="<?= $product["name_product"]; ?>" readonly>
                </div>
                <div>
                    <label for="price_product">Price Total Items</label>
                    <input type="text" name="price_product" id="price_product" value="<?= $totalBeli; ?>" readonly>
                </div>
                <div>
                    <label for="price_product">Date Transaction</label>
                    <input type="date" name="date_product" id="date_product">
                </div>
                <div>
                    <label for="price_product">Stock Item</label>
                    <input type="text" name="stock_product" id="stock_product" value="<?= $result; ?>" readonly>
                </div>
                <div>
                    <label for="price_product">Address</label>
                    <input type="text" name="address" id="address" placeholder="Your Address...">
                </div>
                <div>
                    <button type="submit" name="checkoutProduct">Checkout</button>
                </div>
            </form>

            <?php if (isset($_POST["checkoutProduct"])) {
                global $dbapp;
                $name_user  = $_POST["name_user"];
                $name_product = $_POST["name_product"];
                $price_product = $_POST["price_product"];
                $date_product = $_POST["date_product"];
                $stock_product = $_POST["stock_product"];
                $address = $_POST["address"];
                $createdAt = date("Y-m-d h:m:s");

                $queryAlreadyCheckout = "SELECT * FROM checkout WHERE name_user = '$name_user'";
                $checkout =  mysqli_query($dbapp, $queryAlreadyCheckout);

                if (mysqli_fetch_assoc($checkout)) {
                    echo "<script>alert('Sorry, transaction can only be done once!'); location='nota.php';</script>";
                    return false;
                }

                $queryCheckout = "INSERT INTO checkout VALUES(id_checkout, '$name_user','$name_product','$price_product','$date_product','$stock_product','$address','pending','$createdAt')";
                mysqli_query($dbapp, $queryCheckout);

                echo mysqli_error($dbapp);
                echo "<script>alert('Transaction has been successfully! please wait to accept the order, thank you!'); location='nota.php';</script>";
                unset($_SESSION["cart"]);
                return mysqli_affected_rows($dbapp);
            } ?>

        </div>
    </div>
</section>

<?php require('../partials/footer.php'); ?>