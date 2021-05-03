<?php

$dbapp = mysqli_connect("localhost", "root", "root", "test-app") or die("Failed Connect Db");

function tampilkan_checkout(){
    global $dbapp;

    $query = 'SELECT * FROM checkout';

    $data = mysqli_query($dbapp, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($data)) {
        $rows[] = $row;
    }
    return $rows;
}

function queryData($queryData)
{
    global $dbapp;

    $data = mysqli_query($dbapp, $queryData);
    $rows = [];
    while ($row = mysqli_fetch_assoc($data)) {
        $rows[] = $row;
    }
    return $rows;
}


function createdUser($data)
{

    global $dbapp;

    $fullname = $data["full_name"];
    $username = $data["username"];
    $password = $data["password"];
    $createdUser = date("Y-m-d h:m:s");

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $queryInsertUser = "INSERT INTO users VALUES(id,'$username','$hashedPassword','$fullname','customer','$createdUser')";
    mysqli_query($dbapp, $queryInsertUser);
    return mysqli_affected_rows($dbapp);
}

function createProduct($data)
{
    global $dbapp;

    $name_product = $data["name_product"];
    $price_product = $data["price_product"];
    $category_product = $data["category_product"];
    $stock_product = $data["stock_product"];
    $desc_product = $data["desc_product"];
    $release_product = date("Y-m-d h:m:s");

    $queryCreateProduct = "INSERT INTO products VALUES(id_product, '$name_product', '$price_product', '$category_product','$stock_product', '$desc_product','$release_product')";
    mysqli_query($dbapp, $queryCreateProduct);
    return mysqli_affected_rows($dbapp);
}

function editProduct($data, $id)
{
    global $dbapp;

    $name_product = $data["name_product"];
    $price_product = $data["price_product"];
    $category_product = $data["category_product"];
    $stock_product = $data["stock_product"];
    $desc_product = $data["desc_product"];
    $release_product = date("Y-m-d h:m:s");

    $queryEditProduct = "UPDATE products SET name_product = '$name_product', price_product = '$price_product', category_product = '$category_product', stock_product = '$stock_product', desc_product = '$desc_product', release_product = '$release_product' WHERE id_product = '$id'";
    mysqli_query($dbapp, $queryEditProduct);
    return mysqli_affected_rows($dbapp);
}
function deleteProduct($id)
{
    global $dbapp;

    $queryDeleteProduct = "DELETE FROM products WHERE id_product = '$id'";
    mysqli_query($dbapp, $queryDeleteProduct);
    return mysqli_affected_rows($dbapp);
}

function accept($id){
    global $dbapp;

    $query = "UPDATE checkout SET status ='accept' WHERE id_checkout = '$id'";
    
    if (mysqli_query($dbapp, $query)) {
        return true;
    } else{
        return false;
    }
}

function reject($id) {
    global $dbapp;

    $query = "UPDATE checkout SET status = 'reject' WHERE id_checkout ='$id'";

    if (mysqli_query($dbapp, $query)) {
        return true;
    } else{
        return false;
    }
}
