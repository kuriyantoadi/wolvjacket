<!-- Awal modal Tambah Barang ============================================================== -->
    


    <div class="modal fade bs-example-modal-lg" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Item Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- awal isi modal -->
                <?= form_open('Admin/tambah_stok_barang_up'); ?>
                <form class="m-t-40" novalidate>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">No Faktur :</label>
                    <input type="hidden" name="no_faktur" value="<?= $row_faktur->no_faktur ?>">
                    <input type="text" class="form-control" placeholder="" name="no_faktur" value="<?= $row_faktur->no_faktur ?>" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Cari Barang :</label>

                    <select id="pilihan_barang" class="form-control" name="id_barang" data-trigger placeholder="Cari Barang" required>
                                
                        <?php foreach ($tampil_barang as $row_barang): ?>
                        <option value="<?= $row_barang->id_barang ?>"><?= $row_barang->nama_barang ?></option>
                        
                         <?php endforeach; ?>
                    </select>
                        
                </div>

                <!-- <div class="form-group">
                    <label class="control-label mt-3" for="email">Stok :</label>
                    <input type="text" class="form-control" placeholder="" name="stok" value="" required readonly>
                </div> -->

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Harga Pokok :</label>
                    <input type="text" id="harga_pokok" class="form-control" placeholder="" name="harga_pokok" required readonly>
                    <input type="hidden" class="form-control" placeholder="" name="keterangan" value="<?= $row_faktur->keterangan ?>" >
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Qty :</label>
                    <input type="text" class="form-control" placeholder="" name="jumlah" value="<?= $row_faktur->jumlah ?>" >
                </div>

                

                    <input type="submit" name="submit" class="btn btn-sm btn-primary btn-sm mb-lg-4 mt-lg-4" value="Update"></input>
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


<!-- Awal modal Edit Keterangan ============================================================== -->

    <div class="modal fade bs-example-modal-lg" id="editModalStok<?= $row_faktur->id_stok ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Stok Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- awal isi modal -->
                <?= form_open('Admin/tambah_stok_keterangan_up'); ?>
                <form class="m-t-40" novalidate>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">No Faktur :</label>
                    <input type="hidden" name="id_stok" value="<?= $row_faktur->id_stok ?>">
                    <input type="hidden" name="no_faktur" value="<?= $row_faktur->no_faktur ?>">
                    <input type="text" class="form-control" placeholder="" name="no_faktur" value="<?= $row_faktur->no_faktur ?>" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Harga Total :</label>
                    <input type="text" class="form-control" placeholder="" name="" value="<?= number_format($row_faktur->total_harga_pokok) ?>" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Qty :</label>
                    <input type="text" class="form-control" placeholder="" name="jumlah" value="<?= $row_faktur->total_barang ?>" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Keterangan :</label>
                    <input type="text" class="form-control" placeholder="" name="keterangan" value="<?= $row_faktur->keterangan ?>" >
                </div>

                    <input type="submit" name="submit" class="btn btn-sm btn-primary btn-sm mb-lg-4 mt-lg-4" value="Update"></input>
                    </div>
                </center>
                <?=  form_close(); ?>
                </form>
                    
                <!-- akhir isi modal -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  
<!-- Akhir modal Edit Keterangan ============================================================== -->



<?php foreach ($tampil as $row): ?>

    <div class="modal fade bs-example-modal-lg" id="editModal<?= $row->id_stok ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Stok Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- awal isi modal -->
                <?= form_open('Admin/tambah_stok_edit_up'); ?>
                <form class="m-t-40" novalidate>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">No Faktur :</label>
                    <input type="hidden" name="id_stok" value="<?= $row->id_stok ?>">
                    <input type="text" class="form-control" placeholder="" name="no_faktur" value="<?= $row->no_faktur ?>" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Nama Barang :</label>
                    <input type="text" class="form-control" placeholder="" name="nama_barang" value="<?= $row->nama_barang ?>" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Qty Baru :</label>
                    <input type="text" class="form-control" placeholder="" name="jumlah" value="<?= $row->jumlah ?>" >
                </div>

                    <input type="submit" name="submit" class="btn btn-sm btn-primary btn-sm mb-lg-4 mt-lg-4" value="Update"></input>
                    </div>
                </center>
                <?=  form_close(); ?>
                </form>
                    
                <!-- akhir isi modal -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  
<?php endforeach; ?>
<!-- Akhir modal Edit Barang ============================================================== -->


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-sm-0 font-size-22">Edit Transaksi Tambah Stok</h3>

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
                                    <th><center>No Faktur</th>
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
                                    <tr>
                                        <td><center><?= $row_faktur->no_faktur ?></td>
                                        <td><center><?= $row_faktur->tgl_tambah_stok ?></td>
                                        <td><center>Rp <?= number_format($row_faktur->total_harga_pokok) ?></td>
                                        <td><center><?= $row_faktur->total_barang ?></td>
                                        <td><center><?= $row_faktur->nama_pengguna ?></td>
                                        <td><center><?= $row_faktur->keterangan ?></td>
                                        <td><center>
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModalStok<?= $row_faktur->id_stok ?>"><i class="bx bxs-edit"></i>Edit</button>
                                            <a class="btn btn-primary btn-sm" href="<?= site_url('Admin/tambah_stok_print/'. $row_faktur->no_faktur) ?>"><i class="bx bxs-printer"></i>Print</a>
                                        </td>
                                       
                                    </tr>
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
                        <h3 class="mb-sm-3 font-size-18">Daftar Barang Tambah Stok Faktur <?= $no_faktur ?></h3>
                        
                        <table id='datatable' class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Daftar Item Barang</th> 
                                    <th><center>Qty</th>
                                    <th><center>Harga Pokok</th>
                                    <th><center>Total</th>
                                    <th><center>Opsi</th>
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
                                        <td><center>
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row->id_stok ?>"><i class="bx bxs-edit"></i>Edit</button>
                                            <a href="<?= site_url('Admin/tambah_stok_edit_hapus/'.$row->id_stok.'/'.$row->no_faktur) ?>" onclick="return confirm('Yakin hapus data item Barang <?= $row->nama_barang ?>' )"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>
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
        $(document).ready(function() {
            $('#pilihan_barang').change(function() {
                var id_barang = $(this).val();
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
            });
        });
    </script>

 


<!-- format uang -->
<script src="<?= base_url() ?>assets/js/format-uang.js"></script>

<!-- choices -->
<script src="<?= base_url() ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/form-advanced.init.js"></script>

