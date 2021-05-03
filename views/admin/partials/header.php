<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../admin/assets/css/style.css">

    <title>Admin Page</title>
</head>

<body>

    <header>
        <nav class="navigation">
            <div class="nav-link">
                <a href="../admin/index.php" class="nav-brand">Toko Elektronik || Admin</a>
            </div>
            <div class="nav-link">
                <ul>
                    <a href="create-product.php" class="nav-item">Create Product</a>
                    <a href="history_pembelian.php" class="nav-item">History Order</a>
                    <a href="../index.php" class="nav-item"><?= $_SESSION["full_name"]; ?></a>
                    <a href="../../process/logout.php" class="nav-item">Logout</a>
                </ul>
            </div>
        </nav>
    </header>