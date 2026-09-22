<?php
// Merajut komponen data dan fungsi menggunakan require_once
require_once 'products.php';
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        /* Kelas CSS untuk mewarnai baris tabel jika stok kritis */
        .stok-kritis { background-color: #ffe6e6; color: #cc0000; }
    </style>
</head>
<body>

    <h2>Sistem Informasi Produk</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Total Nilai Aset</th>
            </tr>
        </thead>
        <tbody>
            <!-- Merender data ke layout tabel HTML via perulangan foreach -->
            <?php foreach ($products as $produk) : ?>
                
                <?php 
                // Memanggil logika bisnis dari Processing Layer
                $isKritis = cekStokKritis($produk['stok']);
                $totalNilai = hitungTotalNilaiStok($produk['harga'], $produk['stok']);
                
                // Menentukan kelas CSS baris
                $rowClass = $isKritis ? 'stok-kritis' : '';
                ?>
                
                <tr class="<?= $rowClass ?>">
                    <td><?= $produk['id'] ?></td>
                    <td><?= $produk['nama'] ?></td>
                    <td><?= $produk['kategori'] ?></td>
                    <td>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></td>
                    <td><?= $produk['stok'] ?></td>
                    <td><?= $produk['deskripsi'] ?></td>
                    <td>Rp <?= number_format($totalNilai, 0, ',', '.') ?></td>
                </tr>
                
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>