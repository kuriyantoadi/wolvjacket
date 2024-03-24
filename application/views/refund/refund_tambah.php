<div class="main-content">

    <div class="page-content">
        <div class="container-small">

            <div class="row">

            <h4 class="mb-sm-4 font-size-18 ">Refund Barang</h4>
            <div class="col-xl-6">
                <?= $this->session->flashdata('msg') ?>    
                <div id="message-container"></div>

            </div>

            <div class="col-xl-6">
                <!-- bagian kosong -->
            </div>

                <div class="col-xl-6">
                   
                    <div class="card">  
                        <div class="card-body">

                        <!-- awal -->

                        <h4 class="mb-sm-4 font-size-16 ">Kategori Barang</h4>

                        <a class="btn btn-success  btn-sm" href="<?= site_url('Refund/refund_tambah') ?>">Semua</a>

                        <?php foreach ($tampil_kategori as $row): ?>

                                <a class="btn btn-info  btn-sm" style="margin: 3px" href="<?= site_url('Refund/refund_kategori/'. $row->id_kategori_barang) ?>">
                                    <?= $row->nama_kategori_barang?>
                                </a>

                        <?php endforeach; ?> 

                        <!-- akhir -->

                        <h4 class="mb-sm-4 mt-sm-4 font-size-16">Data Barang</h4>

                        <table id="datatable" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Barang</th>
                                    <th><center>Stok</th>
                                    <th><center>Harga Barang</th> 
                                    <th><center>Qty</th> 
                                    <th><center>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                <?php foreach ($tampil as $row): ?>
                               
                                <tr>
                                    
                                    <td><center><?= $no++; ?></td>
                                    <td><center><?= $row->nama_barang ?></td>
                                    <td><center><?= $row->stok ?></td>
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

                    <h4 class="mb-sm-4 font-size-16 ">Daftar Refund Barang</h4>

                    <table id="tabelKeranjang" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                        <thead>
                            <tr>
                                <th><center>No</th>
                                <th><center>Nama Barang</th>
                                <th><center>Brand</th>
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
                        <?= form_open('Refund/refund_tambah_up') ?>
                        <input type="text" class="form-control" name="keterangan">
                        <input style="float: right;" type="submit" name="submit" value="Proses" onclick="return confirm('Data Sudah Sesuai?')" class="btn mt-2 btn-md btn-success">
                        <?= form_close() ?>

                    </div>
                </div>
            </div> <!-- end col -->
                
                
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

<script>

    function tambahKeKeranjang(namaBarang, harga_pokok, inputId, idBarang) {
        var jumlah = document.getElementById(inputId).value;

        // Kirim data ke server PHP untuk disimpan di database
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?= base_url('refund/tambah_ke_keranjang'); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    const result = JSON.parse(xhr.responseText);
                    console.log(result);

                    // Jika pesan berhasil ditambahkan
                    if (result.message) {
                        alert(result.message);
                        // Refresh data keranjang setelah menambah barang
                        fetchData();
                    }
                } else {
                    // Tampilkan pesan error jika terjadi masalah saat mengirim permintaan
                    alert('Terjadi masalah saat menambahkan barang ke keranjang.');
                }
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
        const response = await fetch('<?= base_url('refund/tampil_keranjang'); ?>');
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

            row.insertCell(2).textContent = tampil_kolom.nama_brand;
            
            var hargaPokokCell = row.insertCell(3);
            hargaPokokCell.textContent = formatCurrency(tampil_kolom.harga_pokok);

            // Tampil jumlah
            var kolom_jumlah = row.insertCell(4);
            kolom_jumlah.textContent = tampil_kolom.jumlah;
            kolom_jumlah.style.textAlign = 'center';

            // Operasi matematika jumlah * harga pokok
            var totalHargaCell = row.insertCell(5);
            var totalHarga = tampil_kolom.jumlah * tampil_kolom.harga_pokok;
            totalHargaCell.textContent = formatCurrency(totalHarga);

            // Tambahkan ke totalSemua
            totalSemua += totalHarga;

            // awal mode hapus 
            var id_refund_keranjang = tampil_kolom.id_refund_keranjang;
            var base_url = '<?= base_url(); ?>';
            var deleteLink = base_url + 'Refund/refund_keranjang_hapus/' + id_refund_keranjang;

            var deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-sm btn-danger';
            var iconElement = document.createElement('i');
            iconElement.className = 'fas fa-trash-alt';
            deleteButton.appendChild(iconElement);

            var cell = row.insertCell(6);
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
        totalCell.setAttribute('colspan', '5'); // Gabungkan 4 kolom

        var totalCell = rowTotal.insertCell(1);
        // totalCell.setAttribute('colspan', '2');

        totalCell.textContent = formatCurrency(totalSemua);
        totalCell.style.fontWeight = 'bold';
        totalCell.style.textAlign = 'center';

    }
    fetchData();   
    

</script>

