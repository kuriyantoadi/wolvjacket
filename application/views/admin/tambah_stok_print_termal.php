<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Print</title>

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />


    <style>
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .text-title {
            text-align: center;
            margin-bottom: 10px;
        }

        .table-faktur {
            margin-bottom: 5px;
        }

        p {
            font-size: 12px; /* Contoh pengaturan ukuran font */
            margin:0;
        }

        .table-barang {
            margin-bottom: 20px;
        }

        .table-barang th, 
        .table-barang td{
            border: 0.2px solid #808080;
            font-size: 12px; /* Mengatur ukuran font menjadi 14px */
        }
        

        /* Menyembunyikan tombol cetak saat mencetak */
        @media print {
            .btn-hidden {
                display: none;
            }
        }
        
    </style>
</head>
<body>
    <div style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">

            <h3 class="text-title">Faktur WolvJacket</h3>

            <table class="table-faktur">
                <tr>
                    <td><p>Tanggal</p> </td>
                    <td><p>: <?= $row_faktur->tgl_tambah_stok ?></p></td>
                </tr>
                <tr>
                    <td><p>No Faktur </p></td>
                    <td><p>: <?= $row_faktur->no_faktur ?></p></td>
                </tr>
                <tr>
                    <td><p>Keterangan </p></td>
                    <td><p>: <?= $row_faktur->keterangan ?></p></td>
                </tr>
                
            </table>

            <table class="table-barang">
                    <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>Item Barang</th> 
                            <th><center>Qty</th>
                            <th><center>Harga Pokok</th>
                            <th><center>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($tampil as $row) { ?>
                            <tr>
                                <td><center><?= $no++ ?></td>
                                <td><?= $row->nama_barang ?></td>
                                <td><center><?= $row->jumlah ?></td>
                                <td><center>Rp <?= number_format($row->harga_pokok) ?></td>
                                <td><center>Rp <?= number_format($row->harga_pokok * $row->jumlah) ?></td>
                            
                            </tr>

                        <?php } ?>
                    </tbody>

                </table>
        
        <a class="btn btn-sm btn-info btn-hidden" href="<?= site_url('Admin/tambah_stok_edit/'.$row_faktur->no_faktur) ?>">Edit Faktur</a>
        <a class="btn btn-sm btn-secondary btn-hidden" href="<?= site_url('Admin/daftar_tambah_stok/') ?>">Daftar Tambah Stok</a>
        <button class="btn btn-sm btn-success btn-hidden" onclick="printContent()"><i class="bx bxs-printer"></i>Print Faktur</button>

    </div>

    <script>
        function printContent() {            
            // Cetak halaman
            window.print();
        }
    </script>

    
</body>
</html>