<!-- admin/tambah_row.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tambah Stok</title>
</head>
<body>
    <h1>Detail Tambah Stok</h1>

    <?php foreach ($tampil_faktur as $row): ?>
    <div class="detail-stok">
        <p><strong>No Faktur:</strong> <?= $row['no_faktur'] ?></p>
        <p><strong>Tanggal:</strong> <?= $row['tgl_tambah_stok'] ?></p>
        <p><strong>Nama Barang:</strong> <?= $row['nama_barang'] ?></p>
        <p><strong>Harga Pokok:</strong> <?= $row['harga_pokok'] ?></p>
        <p><strong>Jumlah:</strong> <?= $row['jumlah'] ?></p>
        <p><strong>Keterangan:</strong> <?= $row['keterangan'] ?></p>
        <p><strong>ID User:</strong> <?= $row['id_user'] ?></p>
    </div>
    <?php endforeach; ?>

</body>
</html>
