
<?php foreach ($tampil_daftar_stok as $row): ?>

<div class="modal fade bs-example-modal-lg" id="editModal<?= $row->no_faktur ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Transaksi Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- awal isi modal -->

                <?php 
                    $cek_no_faktur = $row->no_faktur;
                    // $cek_no_faktur = array($row->no_faktur);

                    // var_dump($cek_no_faktur);
                    
                    ?>

                <table class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                    <thead>
                        <tr>
                            <th><center>No</th>
                            <th><center>No Faktur</th> 
                            <th><center>Tanggal</th> 
                            <th><center>Nama Barang</th>
                            <th><center>Jumlah</th>
                            <th><center>Harga Pokok</th>
                            <th><center>Total</th>
                        </tr>
                        
                    </thead>

                    <?php $no=1; ?>
                    
                    <?php foreach ($detail_daftar_stok as $row_faktur): ?>

                    <tbody>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row_faktur->no_faktur ?></td>
                            <td><?= $row_faktur->tgl_tambah_stok ?></td>
                            <td><?= $row_faktur->nama_barang ?></td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>


                
                </table>
                    
                <!-- akhir isi modal -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<div class="main-content">
<?php endforeach; ?>


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Daftar Tambah Stok</h4>

                        <?= $this->session->flashdata('msg') ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-2">
                    
                    <!-- <div class="d-flex gap-2 flex-wrap mb-1">
                        <button type="button" class="btn btn-info btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Tambah</button>
                    </div>   -->

                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">  
                        <div class="card-body">
                                            

                        <table id="datatable" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <!-- <th><center>No</th> -->
                                    <th><center>No Faktur</th> 
                                    <th><center>Tanggal</th>
                                    <th><center>Total Harga</th>
                                    <th><center>Jumlah</th>
                                    <th><center>Id User</th>
                                    <th><center>Keterangan</th>
                                    <th><center>Pilihan</th>
                                </tr>
            
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



  <script>
        //setting datatables
        $('#datatable').DataTable({
            
            "processing": true,
            "serverSide": true,
            "paging": false,  // Matikan paginasi
            "searching": false,  // Matikan fitur pencarian
            "info": false,  // Matikan informasi
            "order": [],
            "ajax": {
                //panggil method ajax list dengan ajax
                "url": "<?= site_url('Ajax/ajax_tambah_stok_daftar') ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [0,2,3,4,5,6],
                    "className" : 'text-center'
                },

                // mematikan sort kolom pilihan
                {
                // "targets": [6], 
                // "orderable": false
                }
            ]
        });

         
    </script>

<!-- format uang -->
<script src="<?= base_url() ?>assets/js/format-uang.js"></script>

<!-- choices -->
<script src="<?= base_url() ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/form-advanced.init.js"></script>

