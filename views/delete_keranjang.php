<?php
require('../app/app.php');
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../views/signin.php");
}
$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
echo "<script>alert('Barang Telah Diapus Dari Keranjang'); location='cart.php';</script>";
?>