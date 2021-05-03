<?php
    require('../../app/app.php');

    $id = $_GET['id'];
    
    if (accept($id) > 0) {
        echo "<script> 
        alert ('orderan diterima'); 
        location='history_pembelian.php';
        </script>";
    } else{
        echo mysqli_error($dbapp);
    }
?>