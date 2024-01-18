<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

            <h4 class="mb-sm-4 font-size-18 ">Tambah Stok</h4>

                <div class="col-xl-7">
                    <div class="card">  
                        <div class="card-body">

                        <h4 class="mb-sm-4 font-size-18 ">Data Barang</h4>

                        <table id="datatable" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Barang</th>
                                    <th><center>Harga Barang</th> 
                                    <th><center>Qty</th> 
                                    <th><center>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php $no=1; ?>
                                <?php foreach ($tampil as $row): ?>
                               
                                <tr>
                                    
                                    <td><center><?= $no++; ?></td>
                                    <td><center><?= $row->nama_barang?></td>
                                    <td><center><?= $row->harga_pokok?></td>
                                    <td><input class="form-control" type="number" id="jumlahBarang<?= $row->id_barang; ?>" value="1" min="1"></td>
                                    <td>Tambah</button></td>
                                </tr>
                            
                                <?php endforeach; ?>                            
                            </tbody>
                        
                            </table>
                                                
                        </div>
                    </div>
                </div> <!-- end col -->


                <div class="col-xl-5">
                    <div class="card">  
                        <div class="card-body">

                        <h4 class="mb-sm-4 font-size-18 ">Keranjang Belanja Masuk</h4>

                        <table id="tabelKeranjang" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Barang</th>
                                    <th><center>Harga Barang</th> 
                                    <th><center>Qty</th>  
                                    <th><center>Pilihan</th>
                                </tr>
                            </thead>
                        
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
                
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->




   <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fungsi untuk menangani penambahan data ke keranjang belanja
        function addToCart(id, namaBarang, hargaBarang) {
            // Dapatkan jumlah barang dari input field
            var qty = document.getElementById('jumlahBarang' + id).value;

            // Pastikan qty memiliki nilai dan lebih dari atau sama dengan 1
            if (qty && qty >= 1) {
                // Buat baris baru untuk tabel keranjang belanja
                var newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td><center>${id}</td>
                    <td><center>${namaBarang}</td>
                    <td><center>${hargaBarang}</td>
                    <td><center>${qty}</td>
                    <td><center><button onclick="removeFromCart(this)">Hapus</button></td>
                `;

                // Tambahkan baris baru ke tabel keranjang belanja
                document.getElementById('tabelKeranjang').getElementsByTagName('tbody')[0].appendChild(newRow);

                // Bersihkan input field jumlah
                document.getElementById('jumlahBarang' + id).value = 1;
            } else {
                alert("Masukkan jumlah barang yang valid (minimal 1).");
            }
        }

        // Fungsi untuk menangani penghapusan data dari keranjang belanja
        function removeFromCart(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        // Tambahkan event listener ke semua tombol "Tambah"
        var tambahButtons = document.querySelectorAll('td button');
        tambahButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Dapatkan data dari baris yang sesuai di tabel data
                var id = this.parentNode.parentNode.querySelector('td:nth-child(1)').innerText;
                var namaBarang = this.parentNode.parentNode.querySelector('td:nth-child(2)').innerText;
                var hargaBarang = this.parentNode.parentNode.querySelector('td:nth-child(3)').innerText;

                // Tambahkan data ke keranjang belanja
                addToCart(id, namaBarang, hargaBarang);
            });
        });
    });
</script>

        