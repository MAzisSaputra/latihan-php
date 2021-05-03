<?php
require('../app/app.php');

$id = $_GET["id"];

if (deleteProduct($id) > 0) {
    echo "<script>alert('Product has been deleted!'); location='../views/admin/index.php';</script>";
} else {
    echo mysqli_error($dbapp);
    // echo "<script>alert('Product has been created!'); location='../views/admin/index.php';</script>";
}
