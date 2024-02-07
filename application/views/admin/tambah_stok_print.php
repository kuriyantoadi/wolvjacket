<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Print</title>

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />


    <style>
        .text-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .table-faktur {
            margin-bottom: 20px;
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
    <div class="container">

       

            <h3 class="text-title">Faktur WolvJacket</h3>

            <table class="table-faktur">
                <tr>
                    <td>Tanggal </td>
                    <td>: <?= $row_faktur->tgl_tambah_stok ?></td>
                </tr>
                <tr>
                    <td>No Faktur </td>
                    <td>: <?= $row_faktur->no_faktur ?></td>
                </tr>
                <tr>
                    <td>Keterangan </td>
                    <td>: <?= $row_faktur->keterangan ?></td>
                </tr>
                
            </table>

            <table class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>Daftar Item Barang</th> 
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
        
        <a class="btn btn-secondary btn-hidden" href="<?= site_url('Admin/tambah_stok_edit/'.$row_faktur->no_faktur) ?>">Kembali</a>
        <button class="btn btn-primary btn-hidden" onclick="printContent()"><i class="bx bxs-printer"></i>Print Faktur</button>

    </div>

    <script>
        function printContent() {            
            // Cetak halaman
            window.print();
        }
    </script>

    
</body>
</html>