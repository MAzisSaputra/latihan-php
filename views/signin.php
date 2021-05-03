    <?php require('../partials/header.php'); ?>
    <section class="container">
        <form action="../process/signin.php" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="pieck">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="********">
            </div>
            <div>
                <button type="submit" name="login">Login</button>
                <span>No Have Account? <a href="signup.php">Signup Here!</a> </span>
            </div>
        </form>

    </section>

    <?php require('../partials/footer.php'); ?>