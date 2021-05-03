<?php
require('../app/app.php');
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../views/signin.php");
}

$user = $_SESSION["full_name"];
$checkout = queryData("SELECT * FROM checkout WHERE name_user = '$user'")[0];

if ($checkout == NULL) {
    echo "<script>alert('Go Back Home now!'); location='index.php';</script>";
}
?>

<?php require('../partials/header.php'); ?>

<div class="container">
    <h3>Hi <?= $checkout['name_user']; ?></h3>
    <h3>OrderId: <?= $checkout['id_checkout']; ?></h3>
    <h3>This is the item you bought: <?= $checkout['name_product']; ?></h3>
    <h3>The price you pay: Rp <?= number_format($checkout["price_product"]) ?></h3>
    <h3>Status Item: <?= $checkout["status"] ?></h3>
</div>

<?php require('../partials/footer.php'); ?>