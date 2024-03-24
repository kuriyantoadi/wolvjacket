<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

            <h4 class="mb-sm-4 font-size-18 ">Tambah Stok</h4>
            <div class="col-xl-6">
                <?= $this->session->flashdata('msg') ?>    
            </div>

            <div class="col-xl-6">
                <!-- bagian kosong -->
            </div>
           
        
                <div class="col-xl-6">
                   

                    <div class="card">  
                        <div class="card-body">

                        <h4 class="mb-sm-4 font-size-18 ">Data Barang</h4>

                        <table id="datatable" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Barang</th>
                                    <th><center>Harga Barang</th> 
                                    <th><center>Jumlah</th> 
                                    <th><center>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php $no=1; ?>
                                <?php foreach ($tampil as $row): ?>
                               
                                <tr>
                                    
                                    <td><center><?= $no++; ?></td>
                                    <td><center><?= $row->nama_barang?></td>
                                    <td><center>Rp <?= number_format($row->harga_pokok) ?></td>
                                    <td><input type="number" class="form-control" id="jumlahBarang<?= $row->id_barang; ?>" value="1" min="1" maxlength="5"></td>
                                    <td><center><button class="btn btn-sm btn-primary" onclick="tambahKeKeranjang('<?= $row->nama_barang; ?>', <?= $row->harga_pokok; ?>, 'jumlahBarang<?= $row->id_barang; ?>', <?= $row->id_barang; ?>)"><i class="fas fa-shopping-cart"></i></button></td>
                                </tr>
                            
                                <?php endforeach; ?>                            
                            </tbody>
                        
                            </table>
                                                
                        </div>
                    </div>
                </div> 
                <!-- end col -->


                <div class="col-xl-6">
                    <div class="card">  
                        <div class="card-body">

                        <h4 class="mb-sm-4 font-size-18 ">Daftar Barang Tambah Stok</h4>

                        <table id="tabelKeranjang" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Barang</th>
                                    <th><center>Harga Pokok</th> 
                                    <th><center>Qty</th>  
                                    <th><center>Total</th>
                                    <th><center>Opsi</th>
                                </tr>
                            </thead>
                             <tbody id="tabelKeranjang">
                                <!-- Baris-baris keranjang -->
                            </tbody>
                        
                        </table>
                            
                            <strong>Keterangan</strong>
                            <?= form_open('Admin/tambah_stok_up') ?>
                            <input type="text" class="form-control" name="keterangan">
                            <input type="submit" name="submit" value="Proses" onclick="return confirm('Data Sudah Sesuai?')" class="btn mt-2 btn-md btn-success">
                            <?= form_close() ?>

                        </div>
                    </div>
                </div> <!-- end col -->
                
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

<script>
    // Fungsi untuk menambahkan barang ke keranjang
    function tambahKeKeranjang(namaBarang, harga_pokok, inputId, idBarang) {
        var jumlah = document.getElementById(inputId).value;

        // Kirim data ke server PHP untuk disimpan di database
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?= base_url('admin/tambah_ke_keranjang'); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                const result = JSON.parse(xhr.responseText);
                console.log(result);

                // Refresh data keranjang setelah menambah barang
                fetchData();
            }
        };
        xhr.send('nama_barang=' + encodeURIComponent(namaBarang) + '&harga_pokok=' + harga_pokok + '&jumlah=' + jumlah + '&id_barang=' + idBarang);
    }


    //format uang
    function formatCurrency(amount) {
         return 'Rp ' + new Intl.NumberFormat('id-ID').format(amount);
    }


    // Fungsi untuk mendapatkan data barang dari server
    async function fetchData() {
        const response = await fetch('<?= base_url('admin/tampil_keranjang'); ?>');
        const data = await response.json();

        const tabelKeranjang = document.getElementById('tabelKeranjang').getElementsByTagName('tbody')[0];
        tabelKeranjang.innerHTML = '';

        // Inisialisasi totalSemua
        var totalSemua = 0;

        data.forEach((tampil_kolom, index) => {
            const row = tabelKeranjang.insertRow();
            // row.insertCell(0).textContent = index + 1;

            var cell0 = row.insertCell(0);
            cell0.textContent = index + 1;
            cell0.style.textAlign = 'center';

            row.insertCell(1).textContent = tampil_kolom.nama_barang;
            var hargaPokokCell = row.insertCell(2);
            hargaPokokCell.textContent = formatCurrency(tampil_kolom.harga_pokok);

            // Tampil jumlah
            var kolom_jumlah = row.insertCell(3);
            kolom_jumlah.textContent = tampil_kolom.jumlah;
            kolom_jumlah.style.textAlign = 'center';

            // Operasi matematika jumlah * harga pokok
            var totalHargaCell = row.insertCell(4);
            var totalHarga = tampil_kolom.jumlah * tampil_kolom.harga_pokok;
            totalHargaCell.textContent = formatCurrency(totalHarga);

            // Tambahkan ke totalSemua
            totalSemua += totalHarga;

            // awal mode hapus 
            var id_barang = tampil_kolom.id_barang;
            var base_url = '<?= base_url(); ?>';
            var deleteLink = base_url + 'Admin/keranjang_hapus/' + id_barang;

            var deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-sm btn-danger';
            var iconElement = document.createElement('i');
            iconElement.className = 'fas fa-trash-alt';
            deleteButton.appendChild(iconElement);

            var cell = row.insertCell(5);
            cell.appendChild(deleteButton);
            cell.style.textAlign = 'center';

            deleteButton.addEventListener('click', function(event) {
                if (!confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
                    event.preventDefault();
                } else {
                    window.location.href = deleteLink;
                }
            });

            // akhir mode hapus
        });

       // Tambahkan totalSemua ke baris terakhir tabel
       var rowTotal = tabelKeranjang.insertRow();

        // Sel pertama: Total
        var totalCell = rowTotal.insertCell(0);
        totalCell.textContent = "Total";
        totalCell.style.fontWeight = 'bold';
        totalCell.setAttribute('colspan', '4'); // Gabungkan 4 kolom

        var totalCell = rowTotal.insertCell(1);
        // totalCell.setAttribute('colspan', '2');

        totalCell.textContent = formatCurrency(totalSemua);
        totalCell.style.fontWeight = 'bold';
        totalCell.style.textAlign = 'center';

    }
    fetchData();   
    

</script>

