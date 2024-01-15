<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

            <h4 class="mb-sm-4 font-size-18 ">Tambah Stok</h4>

                <div class="col-xl-7">
                    <div class="card">  
                        <div class="card-body">

                        <h4 class="mb-sm-4 font-size-18 ">Data Barang</h4>

                        <table id="tableBarang" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
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

     // Fungsi untuk menambahkan barang ke keranjang
    function tambahKeKeranjang(namaBarang, harga, inputId, idBarang) {
        var jumlah = document.getElementById(inputId).value;

        // Kirim data ke server PHP untuk disimpan di database
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?= base_url('Admin/tambah_ke_keranjang'); ?>', true);
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
        const response = await fetch('<?= base_url('Admin/tampil_keranjang'); ?>');
        const data = await response.json();

        const tabelKeranjang = document.getElementById('tabelKeranjang').getElementsByTagName('tbody')[0];
        tabelKeranjang.innerHTML = '';

        data.forEach((tampil_kolom) => {
            const row = tabelKeranjang.insertRow();
            row.insertCell(0).textContent = tampil_kolom.id_barang;
            row.insertCell(1).textContent = tampil_kolom.nama_barang;
            row.insertCell(2).textContent = tampil_kolom.harga;
            row.insertCell(3).textContent = tampil_kolom.jumlah; // Ganti indeks ke-1 dengan ke-2
            
            // awal mode hapus 
            // Mendapatkan nilai id_barang dari PHP
            var id_barang = tampil_kolom.id_barang;

            // Mendapatkan nilai base_url dari PHP
            var base_url = '<?= base_url(); ?>';

            // Membuat link untuk tombol hapus
            var deleteLink = base_url + 'Barang/keranjang_hapus/' + id_barang;

            // Membuat elemen tombol hapus dengan Bootstrap styling
            var deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger'; // Menambahkan kelas Bootstrap untuk warna merah (danger)
            deleteButton.textContent = 'Hapus Barang';

            // Menambahkan tombol ke dalam sel ke-4 di baris tabel
            var cell = row.insertCell(4);
            cell.appendChild(deleteButton);

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