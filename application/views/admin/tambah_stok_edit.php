<?php foreach ($tampil as $row): ?>

    <div class="modal fade bs-example-modal-lg" id="editModal<?= $row->id_stok ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Edit Stok</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- awal isi modal -->
                <?= form_open('Admin/tambah_stok_edit_up'); ?>
                <form class="m-t-40" novalidate>

                <!-- <div class="form-group">
                    <label class="control-label mt-3" for="email">Nama Pelanggan :</label>
                    <input type="hidden" name="id_pelanggan" value="<?= $row->id_pelanggan ?>">
                    <input type="text" class="form-control" placeholder="" name="nama_pelanggan" value="<?= $row->nama_pelanggan ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">No Hp Pelanggan :</label>
                    <input type="text" class="form-control" placeholder="" name="no_hp_pelanggan" value="<?= $row->no_hp_pelanggan ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Alamat Pelanggan:</label>
                    <input type="text" class="form-control" placeholder="" name="alamat_pelanggan" value="<?= $row->alamat_pelanggan ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Kota Pelanggan :</label>
                    <input type="text" class="form-control" placeholder="" name="kota_pelanggan" value="<?= $row->kota_pelanggan ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Level :</label>
                    <input type="text" class="form-control" placeholder="" name="level" value="<?= $row->level ?>" >
                </div> -->

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
                        <h4 class="mb-sm-0 font-size-18">Detail Tambah Stok</h4>

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

                        <!-- <strong>Faktur : <?= $no_faktur ?></strong>
                        <br><strong>Tanggal Faktur : <?= $tgl_faktur->tgl_tambah_stok ?></strong> -->
                        
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
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row->id_stok ?>"><i class="bx bxs-pencil"></i>Edit</button>
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

