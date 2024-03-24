<?php foreach ($tampil as $row): ?>
    <div class="modal fade bs-example-modal-xl" id="editModal<?= $row->no_faktur_refund ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Detail Transaksi - <?= $row->no_faktur_refund ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Faktur</th>
                                <th>Nama Barang</th>
                                <th>Brand</th>
                                <th>Qty</th>
                                <th>Harga Pokok</th>
                                <th>Total</th>

                                <!-- Tambahkan kolom sesuai kebutuhan -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Ambil data berdasarkan no_faktur tertentu
                            $filtered_data = $this->M_refund->get_data_by_no_faktur($row->no_faktur_refund);
                            $counter = 1;
                            foreach ($filtered_data as $item): ?>
                                <tr>
                                    <td><?= $counter ?></td>
                                    <td><?= $item->no_faktur_refund ?></td>
                                    <td><?= $item->nama_barang ?></td>
                                    <td><?= $item->nama_brand ?></td>
                                    <td><?= $item->jumlah ?></td>
                                    <td><?= 'Rp '. number_format($item->harga_pokok) ?></td>
                                    <td><?= 'Rp '. number_format($item->jumlah * $item->harga_pokok) ?></td>
                                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                                </tr>
                            <?php 
                            $counter++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  
<?php endforeach; ?> 

<div class="main-content">
    <div class="page-content">
        <div class="container">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Daftar Refund</h4>

                        <?= $this->session->flashdata('msg') ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-2">
                    
                    <div class="d-flex gap-2 flex-wrap mb-1">
                        <a href="<?= site_url('Refund/refund_tambah') ?>" class="btn btn-info btn-sm waves-effect waves-light">Tambah</a>
                    </div>  

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
                                    <th><center>No</th>
                                    <th><center>No Faktur</th> 
                                    <th><center>Tanggal</th>
                                    <th><center>Total Harga</th>
                                    <th><center>Qty</th>
                                    <th><center>User ID</th>
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
                "url": "<?= site_url('Ajax/ajax_refund') ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 2,3,4,5,6, 7],
                    "className" : 'text-center'
                },

                // mematikan sort kolom pilihan
                {
                "targets": [6,7], 
                "orderable": false
                }
            ]
        });

         
    </script>

<!-- format uang -->
<script src="<?= base_url() ?>assets/js/format-uang.js"></script>

<!-- choices -->
<script src="<?= base_url() ?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/form-advanced.init.js"></script>

