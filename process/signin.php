<?php
session_start();
require('../app/app.php');

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $queryCekAccount = "SELECT * FROM users WHERE username = '$username'";
    $user =  mysqli_query($dbapp, $queryCekAccount);
    if (mysqli_num_rows($user) === 1) {
        $data = mysqli_fetch_assoc($user);
        if (password_verify($password, $data["password"])) {
            if ($data["role"] === "customer") {
                $_SESSION["user"] = true;
                $_SESSION["id_user"] = $data["id"];
                $_SESSION["full_name"] = $data["full_name"];
                header("Location: ../views/index.php");
            } else if ($data["role"] === "admin") {
                $_SESSION["user"] = true;
                $_SESSION["id_user"] = $data["id"];
                $_SESSION["full_name"] = $data["full_name"];
                header("Location: ../views/admin/index.php");
            }
        } else {
            echo "<script>alert('password not found!'); location='../views/signin.php';</script>";
        }
    }
}
