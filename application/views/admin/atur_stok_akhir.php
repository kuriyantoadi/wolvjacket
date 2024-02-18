<?php foreach ($tampil as $row): ?>
    <div class="modal fade bs-example-modal-xl" id="detailModal<?= $row->id_proses_stok ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Stok Akhir - <?= $row->tahun_bulan ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Proses Stok</th>
                                <th>Nama Barang</th>
                                <th>Stok Akhir</th>
                                <th>Total Harga Modal</th>

                                <!-- Tambahkan kolom sesuai kebutuhan -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Ambil data berdasarkan no_faktur tertentu
                            $filtered_data = $this->M_admin->get_data_by_proses_stok($row->id_proses_stok);
                            $counter = 1;
                            foreach ($filtered_data as $item): ?>
                                <tr>
                                    <td><?= $counter ?></td>
                                    <td><?= $item->id_proses_stok ?></td>
                                    <td><?= $item->nama_barang ?></td>
                                    <td><?= $item->total_stok ?></td>
                                    <td><?= 'Rp '. number_format($item->harga_pokok * $item->total_stok) ?></td>
                                    <!-- <td><?= 'Rp '. number_format($item->harga_pokok) ?></td> -->
                                    <!-- <td><?= 'Rp '. number_format($item->jumlah * $item->harga_pokok) ?></td> -->
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



<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Atur Stok Akhir</h4>
                        <?= $this->session->flashdata('msg') ?>
                    </div>
                </div>


                <?= form_open('Admin/atur_stok_akhir_up'); ?>
                <div class="col-6">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <input name="tahun_bulan" class="form-control m-1" type="month" value="" id="example-month-input" required>
                        <input type="submit" class="btn btn-primary btn-sm m-1" value="Atur Stok Akhir Bulan Ini">
                    </div>
                </div>

                <?= form_close() ?>

            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">  
                        <div class="card-body">
                                            

                        <table id="datatable" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Id</th> 
                                    <th><center>Bulan</th>
                                    <th><center>Total Stok</th>
                                    <th><center>Total Modal</th>
                                    <th><center>Pilihan</th>
                                </tr>
            
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->            
            
        </div><!-- container-fluid -->
    </div> <!-- End Page-content  -->
</div><!-- Main content -->

    
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
                "url": "<?= site_url('Ajax/ajax_atur_stok') ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 2,3,4,5],
                    "className" : 'text-center'
                },

                // mematikan sort kolom pilihan
                // {
                // "targets": [0], 
                // "orderable": false
                // }
            ]
        });

         
    </script>
