<?php
require('../app/app.php');

session_start();

$id =  $_GET["id"];

unset($_SESSION["cart"][$id]);
echo "<script>alert('This item has been your remove from the cart!'); location='../views/cart.php';</script>";
