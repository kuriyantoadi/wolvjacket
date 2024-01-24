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
                                    <td><input type="number" class="form-control" id="jumlahBarang<?= $row->id_barang; ?>" value="1" min="1"></td>
                                    <td><button class="btn btn-sm btn-primary" onclick="tambahKeKeranjang('<?= $row->nama_barang; ?>', <?= $row->harga_pokok; ?>, 'jumlahBarang<?= $row->id_barang; ?>', <?= $row->id_barang; ?>)">Tambah</button></td>
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
                             <tbody id="tabelKeranjang">
                                <!-- Baris-baris keranjang -->
                            </tbody>
                        
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
                
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

<script>
    // Fungsi untuk menambahkan barang ke keranjang
    function tambahKeKeranjang(namaBarang, harga, inputId, idBarang) {
        var jumlah = document.getElementById(inputId).value;

        // Kirim data ke server PHP untuk disimpan di database
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?= base_url('barang/tambah_ke_keranjang'); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                const result = JSON.parse(xhr.responseText);
                console.log(result);

                // Refresh data keranjang setelah menambah barang
                fetchData();
            }
        };
        xhr.send('nama_barang=' + encodeURIComponent(namaBarang) + '&harga=' + harga + '&jumlah=' + jumlah + '&id_barang=' + idBarang);
    }


    // Fungsi untuk mendapatkan data barang dari server
    async function fetchData() {
        const response = await fetch('<?= base_url('barang/tampil_keranjang'); ?>');
        const data = await response.json();

        const tabelKeranjang = document.getElementById('tabelKeranjang').getElementsByTagName('tbody')[0];
        tabelKeranjang.innerHTML = '';

        data.forEach((tampil_kolom, index) => {
            const row = tabelKeranjang.insertRow();
            // row.insertCell(0).textContent = index + 1;

            var cell0 = row.insertCell(0);
            cell0.textContent = index+1;
            cell0.style.textAlign = 'center';

            row.insertCell(1).textContent = tampil_kolom.nama_barang;
            row.insertCell(2).textContent = tampil_kolom.harga;

            //  tampil jumlah
            var kolom_jumlah = row.insertCell(3);
            kolom_jumlah.textContent = tampil_kolom.jumlah;
            kolom_jumlah.style.textAlign = 'center';
            


            // awal mode hapus 

            // Mendapatkan nilai id_barang dari PHP
            var id_barang = tampil_kolom.id_barang;

            // Mendapatkan nilai base_url dari PHP
            var base_url = '<?= base_url(); ?>';

            // Membuat link untuk tombol hapus
            var deleteLink = base_url + 'Barang/keranjang_hapus/' + id_barang;

            // Membuat elemen dengan ikon hapus
            var deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-sm btn-danger'; // Menambahkan kelas Bootstrap untuk warna merah (danger)

            // Menambahkan ikon hapus ke dalam tombol
            var iconElement = document.createElement('i');
            iconElement.className = 'fas fa-trash-alt'; // Menggunakan ikon trash-alt dari Font Awesome
            deleteButton.appendChild(iconElement);

            // posisi elemen di tengah
           

            // Menambahkan tombol ke dalam sel ke-4 di baris tabel
            var cell = row.insertCell(4);
            cell.appendChild(deleteButton);
            cell.style.textAlign = 'center'; // Menengahkan isi sel ke tengah secara horizontal

            // Menambahkan event listener untuk menampilkan konfirmasi sebelum menghapus
            deleteButton.addEventListener('click', function(event) {
                // ...
            });


            // Menambahkan event listener untuk menampilkan konfirmasi sebelum menghapus
            deleteButton.addEventListener('click', function(event) {
                // Tampilkan alert konfirmasi
                if (!confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
                    event.preventDefault(); // Mencegah tindakan default tombol jika pembatalan diklik
                } else {
                    // Jika konfirmasi diterima, navigasi ke tautan penghapusan
                    window.location.href = deleteLink;
                }
            });

            // akhir mode hapus

        });
    }
    fetchData();   
    

</script>

