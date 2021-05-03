<?php
    require('../../app/app.php');

    session_start();

    $data_pembelian = tampilkan_checkout();

    require('partials/header.php');
?>

    <h1 class="text-center mt-5 mb-4"> History Pembelian </h1>
    <p class="text-center"><a href="index.php">Kembali</a></p>
    <div class="container-fluid">
        <table class="table mt-5" border="1">
            <thead>
                <tr>
                <th scope="col">Id Pembelian</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Nama Product</th>
                <th scope="col">Price Product</th>
                <th scope="col">Data Product</th>
                <th scope="col">Stock Produk</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">Waktu Dibeli</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor = 1;
                foreach ($data_pembelian as $data) : ?>
                <tr>
                <th><?= $nomor++?></th>
                <td><?= $data['name_user'] ?></td>
                <td><?= $data['name_product']?></td>
                <td><?= number_format($data['price_product'])?></td>
                <td><?= $data['date_product']?></td>
                <td><?= $data['stock_product']?></td>
                <td><?= $data['address']?></td>
                <td><?= $data['status']?></td>
                <td>
                    <?php if ($data['status'] === "accept") : ?>
                    <span class="text-success fw-bold"><?= $data['status'] ?></span>
                    <?php elseif($data['status'] === "reject") : ?> 
                    <span class="text-danger fw-bold"><?= $data['status'] ?></span>
                    <?php else : ?>
                    <p><?= $data['status'] ?></p>
                    <a href="accept.php?id=<?= $data['id_checkout'] ?>" class="btn btn-success">Accept</a>
                    <a href="reject.php?id=<?= $data['id_checkout'] ?>" class="btn btn-danger">Reject</a>
                    <?php endif;?>
                </td>
                <td><?= date("d-M-Y", strtotime($data["createdAt"])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php
    require('partials/footer.php');
?>