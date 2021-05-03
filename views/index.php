<?php
session_start();
require('../app/app.php');

$test = queryData("SELECT * FROM users");
?>

<?php require('../partials/header.php'); ?>
<section class="container">
    <div class="hero-index">
        <div class="right">Belanja Disini Aja</div>
        <div class="left">GASSSS</div>
    </div>

    <div class="content-feature">
        <h2>Why Faster App</h2>
        <div>right</div>
        <div>left</div>
    </div>

    <div class="content-support">
        <h5>Hubungi saya jika anda berkenan</h5>
        <div class="center-sosmed">
            <!-- 
            1. ig
            2.github
            3. telegram
         -->
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2021 PT EPSON Indonesia, All rights reserved.</p>
    </footer>

</section>

<?php require('../partials/footer.php'); ?>