<!-- Awal modal Tambah Barang ============================================================== -->
    <div class="modal fade bs-example-modal-lg" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Retur - Tambah Item Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- awal isi modal -->
                <?= form_open('Admin/tambah_stok_barang_up'); ?>
                <form class="m-t-40" novalidate>

                <?php foreach ($tampil as $row_faktur): ?>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">No Faktur Retur:</label>
                    <input type="hidden" name="no_faktur_retur" value="<?= $row_faktur->no_faktur_retur ?>">
                    <input type="text" class="form-control" placeholder="" name="no_faktur_retur" value="<?= $row_faktur->no_faktur_retur ?>" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Tanggal :</label>
                    <input type="text" class="form-control" placeholder="" name="tanggal" value="<?= date('d-m-Y') ?>" required readonly>
                </div>

                

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Cari Barang :</label>

                    <select id="pilihan_barang" class="form-control" name="id_barang" data-trigger placeholder="Cari Barang" required>
                        
                        <option value="">Pilihan</option>

                        <?php foreach ($tampil_barang as $row_barang): ?>
                        <option value="<?= $row_barang->id_barang ?>"><?= $row_barang->nama_barang ?></option>
                        
                         <?php endforeach; ?>
                    </select>
                        
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Stok :</label>
                    <input type="text"  id="stok" class="form-control" placeholder="" name="stok" value="" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Harga Pokok :</label>
                    <input type="text" id="harga_pokok" class="form-control" placeholder="" name="harga_pokok" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Jumlah :</label>
                    <input type="number" class="form-control" placeholder="" name="jumlah" value="" >
                </div>

                <?php endforeach; ?>

                    <input type="submit" name="submit" class="btn btn-sm btn-primary btn-sm mb-lg-4 mt-lg-4" value="Tambah"></input>
                    </div>
                </center>
                <?=  form_close(); ?>
                </form>
                    
                <!-- akhir isi modal -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  
<!-- Akhir modal Tambah Barang ============================================================== -->



<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Transaksi Retur</h4>
                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-6">
                        <?= $this->session->flashdata('msg') ?>
                </div>

                <div class="col-6">
                    <!-- kosong -->
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-2">
                    
                    <div class="d-flex gap-2 flex-wrap mb-1">
                        <a type="button" href="<?= base_url() ?>Admin/daftar_tambah_stok" class="btn btn-sm btn-secondary waves-effect waves-light" >Kembali</a>
                        <button class="btn btn-sm btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#tambahModal"><i class="bx bx-list-plus"></i>Tambah Item</button>
                    </div>  

                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">  
                        <div class="card-body">

                        <table id='datatable2' class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No Faktur Retur</th>
                                    <th><center>Tanggal</th> 
                                    <th><center>Total Harga</th>
                                    <th><center>Qty</th>
                                    <th><center>User ID</th>
                                    <th><center>Keterangan</th>
                                    <th><center>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no=1; ?>

                                <?php foreach ($tampil as $row): ?>
                                    <tr>
                                        <td><center><?= $row->no_faktur_retur ?></td>
                                        <td><center><?= $row->tanggal ?></td>
                                        <td><center>Rp <?= number_format($row->total_harga) ?></td>
                                        <td><center><?= $row->total_jumlah ?></td>
                                        <td><center><?= $row->id_user ?></td>
                                        <td><center><?= $row->keterangan ?></td>
                                        <td><center>
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModalStok<?= $row->id_retur ?>"><i class="bx bxs-edit"></i>Edit</button>
                                            <a class="btn btn-success btn-sm" href="<?= site_url('Admin/tambah_stok_print/'. $row->id_retur) ?>"><i class="bx bxs-printer"></i>Print</a>
                                        </td>
                                       
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
            
                        </table>


                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



            <div class="row">
                <div class="col-12">
                    <div class="card">  
                        <div class="card-body">
                        <h3 class="mb-sm-3 font-size-18">Daftar Barang Faktur</h3>
                        
                        <table id='datatable' class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Daftar Item Barang</th>
                                    <th><center>Brand</th>  
                                    <th><center>Qty</th>
                                    <th><center>Harga Pokok</th>
                                    <th><center>Total</th>
                                    <th><center>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no=1; ?>
                                <?php foreach ($tampil_barang as $row) { ?>
                                    <tr>
                                        <td><center><?= $no++ ?></td>
                                        <td><?= $row->nama_barang ?></td>
                                        <td><center><?= $row->nama_brand ?></td>
                                        <td><center><?= $row->jumlah ?></td>
                                        <td><center>Rp <?= number_format($row->harga_pokok) ?></td>
                                        <td><center>Rp <?= number_format($row->harga_pokok * $row->jumlah) ?></td>
                                        <td><center>
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row->id_retur_barang ?>"><i class="bx bxs-edit"></i>Edit</button>
                                            <a href="<?= site_url('Admin/tambah_stok_edit_hapus/'.$row->id_retur_barang.'/'.$row->no_faktur_retur) ?>" onclick="return confirm('Yakin hapus data item Barang <?= $row->nama_barang ?>' )"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>
                                        </td>
                                    </tr>

                                <?php } ?>
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
        // $(document).ready(function() {
        //     $('#pilihan_barang').change(function() {
        //         var id_barang = $(this).val();
        //         if (id_barang === '') {
        //             $('#harga_pokok').val('Anda Belum Memilih Barang');
        //         } else {
        //             $.ajax({
        //                 url: '<?= base_url('Admin/get_harga_pokok') ?>',
        //                 method: 'POST',
        //                 data: {id_barang: id_barang},
        //                 success: function(response) {
        //                     $('#harga_pokok').val(response);
        //                 },
        //                 error: function(xhr, status, error) {
        //                     console.error(xhr.responseText);
        //                 }
        //             });
        //         }
        //     });
        // });

        $(document).ready(function() {
            $('#pilihan_barang').change(function() {
                var id_barang = $(this).val();
                if (id_barang === '') {
                    $('#harga_pokok').val('Anda Belum Memilih Barang');
                    $('#stok_barang').val('');
                } else {
                    $.ajax({
                        url: '<?= base_url('Admin/get_harga_pokok') ?>',
                        method: 'POST',
                        data: {id_barang: id_barang},
                        success: function(response) {
                            $('#harga_pokok').val(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });

                    // Permintaan AJAX untuk mendapatkan stok barang
                    $.ajax({
                        url: '<?= base_url('Admin/get_stok_barang') ?>',
                        method: 'POST',
                        data: {id_barang: id_barang},
                        success: function(response) {
                            $('#stok').val(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });

    </script>

 


<!-- format uang -->
<script src="<?= base_url() ?>assets/js/format-uang.js"></script>

<!-- choices -->
<script src="<?= base_url() ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/form-advanced.init.js"></script>

