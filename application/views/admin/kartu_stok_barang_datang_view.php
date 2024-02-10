<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman F4 Landscape</title>
    <style>
        @page {
            size: F4 landscape;
            margin: 0;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 10px;
            /* line-height: 1.6; */
            padding: 30px;
        }
        .content {
            width: 100%;
            /* max-width: 800px; */
            margin: 0 auto;
        }
        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            /* margin-bottom: 20px; */
        }
        p {
            /* margin-top: 0; */
            /* margin-bottom: 20px; */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
        td {
            border: 1px solid black; /* Mengatur border dengan ketebalan 1 piksel dan warna hitam */
            /* padding: 8px; */
            text-align: left;
        }

        .td-title {
            background-color: #f2f2f2;
            text-align: center;
            border: 1px solid black;
            padding: 2px;
        }
    </style>

    <!-- <script>
        window.onload = function() {
            // var isF4 = confirm("Gunakan kertas F4? Jika tidak, maka akan menggunakan kertas Legal.");
            if (isF4) {
                document.body.style.width = "340mm"; // Lebar F4
                document.body.style.height = "215.9mm"; // Tinggi F4
            } else {
                document.body.style.width = "215.9mm"; // Lebar Legal
                document.body.style.height = "355.6mm"; // Tinggi Legal
            }
            document.body.style.transform = "rotate(90deg)"; // Rotasi landscape
            document.body.style.transformOrigin = "top left"; // Atur titik rotasi
            document.body.style.margin = "0"; // Hapus margin
        }
    </script> -->
</head>
<body>
    <div class="content">
        <h1>Selamat Datang di Halaman F4 Landscape</h1>

        <table>
            <tr>
                <td class="td-title" rowspan="2">No</td>
                <td class="td-title" rowspan="2">Nama Barang</td>
                <td class="td-title" rowspan="2">Harga Modal</td>
                <td class="td-title" rowspan="2">Stok Awal</td>
                <td class="td-title" rowspan="2">Barang Masuk</td>
                <td class="td-title" colspan="31">Barang Masuk Per Tanggal</td>
                <td class="td-title" rowspan="2">Total Jual</td>
                <td class="td-title" rowspan="2">Retur</td>
                <td class="td-title" rowspan="2">Refund</td>
                <td class="td-title" rowspan="2">Qty Akhir</td>
                <td class="td-title" rowspan="2">Total Harga Modal</td>
            </tr>

            <tr>
                <td class="td-title">1</td>
                <td class="td-title">2</td>
                <td class="td-title">3</td>
                <td class="td-title">4</td>
                <td class="td-title">5</td>
                <td class="td-title">6</td>
                <td class="td-title">7</td>
                <td class="td-title">8</td>
                <td class="td-title">9</td>
                <td class="td-title">10</td>
                <td class="td-title">11</td>
                <td class="td-title">12</td>
                <td class="td-title">13</td>
                <td class="td-title">14</td>
                <td class="td-title">15</td>
                <td class="td-title">16</td>
                <td class="td-title">17</td>
                <td class="td-title">18</td>
                <td class="td-title">19</td>
                <td class="td-title">20</td>
                <td class="td-title">21</td>
                <td class="td-title">22</td>
                <td class="td-title">23</td>
                <td class="td-title">24</td>
                <td class="td-title">25</td>
                <td class="td-title">26</td>
                <td class="td-title">27</td>
                <td class="td-title">28</td>
                <td class="td-title">29</td>
                <td class="td-title">30</td>
                <td class="td-title">31</td>
            </tr>

            <tr>
                <?php 
                    $no=1; 
                    foreach ($tampil as $row): 

                    $harga_pokok = $row->harga_pokok;
                    $harga_pokok_formatted = number_format($harga_pokok, 0, ',', '.');

                ?>
                    <tr>
                        
                        <td><center><?= $no++; ?></td>
                        <td><center><?= $row->nama_barang ?></td>
                        <td><center>Rp <?= $harga_pokok_formatted ?></td>
                    </tr>
            
                <?php endforeach; ?>     
            </tr>
                
        </table>

    </div>
</body>
</html>
