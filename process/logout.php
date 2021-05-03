<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('You Logout!'); location='../views/index.php';</script>";
