<?php
    require('../../app/app.php');

    $id = $_GET['id'];
    
    if (reject($id) > 0) {
        echo "<script> 
        alert ('orderan ditolak'); 
        location='history_pembelian.php';
        </script>";
    } else{
        echo mysqli_error($dbapp);
    }
?>