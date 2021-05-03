<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #34ebe1;
            /* margin: 20px; */
            padding: 20px;
        }

        .navbar .nav-brand h3 {
            font-size: 26px;
            font-weight: 600;
            color: white;
        }

        .navbar .nav-list {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px;
        }

        .navbar .nav-list .nav-item {
            margin-left: 2rem;
            text-decoration: none;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }
    </style>

    <title>Toko Elektronik</title>
</head>

<body>
    <header class="navbar">
        <nav class="navigation">
            <div class="nav-right">
                <a href="../views/index.php" class="nav-brand">
                    Faster App
                </a>
            </div>
            <?php if (isset($_SESSION["user"])) : ?>
                <div class="nav-list">
                    <a href="../views/katalog-product.php" class="nav-item">Katalog</a>
                    <a href="../views/cart.php" class="nav-item">Cart</a>
                    <a href="../views/nota.php" class="nav-item">history pembelian</a>
                    <a href="../views/index.php" class="nav-item"><?= $_SESSION["full_name"]; ?></a>
                    <a href="../process/logout.php" class="nav-item">Logout</a>
                </div>
            <?php elseif (!isset($_SESSION["user"])) : ?>
                <a href="../views/katalog-product.php" class="text-auth">Katalog</a>
                <a href="../views/signin.php" class="text-auth-login">Login</a>
                </div>
            <?php endif; ?>
        </nav>
    </header>