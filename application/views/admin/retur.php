
<div class="main-content">

    <div class="page-content">
        <div class="container-small">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Daftar Retur</h4>

                        <?= $this->session->flashdata('msg') ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-2">
                    
                    <div class="d-flex gap-2 flex-wrap mb-1">
                        <button type="button" class="btn btn-info btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Tambah</button>
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
                "url": "<?= site_url('Ajax/ajax_retur') ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 2,3,4,5,6, 7],
                    "className" : 'text-center'
                },

                // mematikan sort kolom pilihan
                {
                // "targets": [8], 
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

