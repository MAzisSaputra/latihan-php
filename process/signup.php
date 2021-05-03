<?php
require('../app/app.php');
if (isset($_POST["register"])) {
    if (createdUser($_POST) > 0) {
        echo "<script>alert('User has been created!'); location='../views/signin.php';</script>";
    } else {
        echo mysqli_error($dbapp);
    }
}
