<?php
require('../app/app.php');
if (isset($_POST["createProduct"])) {
    if (createProduct($_POST) > 0) {
        echo "<script>alert('Product has been created!'); location='../views/admin/index.php';</script>";
    } else {
        echo mysqli_error($dbapp);
        // echo "<script>alert('Product has been created!'); location='../views/admin/index.php';</script>";
    }
}
