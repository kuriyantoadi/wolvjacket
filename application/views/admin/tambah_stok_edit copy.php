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

                        <?= $this->session->flashdata('msg') ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-2">
                    
                    <div class="d-flex gap-2 flex-wrap mb-1">
                        <a type="button" href="<?= base_url() ?>Admin/daftar_tambah_stok" class="btn btn-secondary btn-sm waves-effect waves-light" >Kembali</a>
                    </div>  

                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">  
                        <div class="card-body">

                        <table id='datatable' class="table table-bordered dt-responsive nowrap w-100">
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
                                        <td><center>Rp <?= number_format($row_faktur->jumlah * $row_faktur->harga_pokok) ?></td>
                                        <td><center><?= $row_faktur->jumlah ?></td>
                                        <td><center><?= $row_faktur->nama_pengguna ?></td>
                                        <td><center><?= $row_faktur->keterangan ?></td>
                                        <td><center>
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row->id_stok ?>"><i class="bx bxs-edit"></i>Edit</button>
                                            <a href="<?= site_url('Admin/pelanggan_hapus/'.$row->id_stok) ?>" onclick="return confirm('Yakin hapus data item Barang <?= $row->nama_barang ?>' )"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>
                                        </td>

                                    </tr>
                            </tbody>
            
                        </table>

                        <strong>Faktur : <?= $no_faktur ?></strong>
                        <br><strong>Tanggal Faktur : <?= $tgl_faktur->tgl_tambah_stok ?></strong>
                        
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
                                            <a href="<?= site_url('Admin/pelanggan_hapus/'.$row->id_stok) ?>" onclick="return confirm('Yakin hapus data item Barang <?= $row->nama_barang ?>' )"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>
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


<!-- format uang -->
<script src="<?= base_url() ?>assets/js/format-uang.js"></script>

<!-- choices -->
<script src="<?= base_url() ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/form-advanced.init.js"></script>

