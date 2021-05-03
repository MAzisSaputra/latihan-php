<section class="container">
    <?php require('../partials/header.php'); ?>
    <form action="../process/signup.php" method="post">
        <div>
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Pick Finger">
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="pieck">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="********">
        </div>
        <div>
            <button type="submit" name="register">Register</button>
            <span>No Have Account? <a href="signin.php">Signin Here!</a> </span>
        </div>
    </form>

</section>

<?php require('../partials/footer.php'); ?>