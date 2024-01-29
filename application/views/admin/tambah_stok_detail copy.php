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

                        <strong>Faktur : <?= $no_faktur ?></strong>
                        <br><strong>Tanggal Faktur : <?= $tgl_faktur->tgl_tambah_stok ?></strong>
                        
                        <table id='datatable' class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>No Faktur</th> 
                                    <th><center>Tanggal</th>
                                    <th><center>Nama Barang</th>
                                    <th><center>Total Harga</th>
                                    <th><center>Jumlah</th>
                                    <th><center>Id User</th>
                                    <th><center>Keterangan</th>
                                   
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no=1; ?>
                                <?php foreach ($tampil as $row) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->no_faktur ?></td>
                                        <td><?= $row->tgl_tambah_stok ?></td>
                                        <td><?= $row->nama_barang ?></td>
                                        <td><?= $row->harga_pokok ?></td>
                                        <td><?= $row->jumlah ?></td>
                                        <td><?= $row->id_user ?></td>
                                        <td><?= $row->keterangan ?></td>
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

