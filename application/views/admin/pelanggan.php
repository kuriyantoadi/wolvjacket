<!-- ============================================================== -->

<!-- awal modal Tambah Barang ============================================================== -->

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- awal isi modal -->
                <?= form_open('Admin/pelanggan_tambah_up'); ?>
                <form class="m-t-40" novalidate>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Nama Pelanggan :</label>
                    <input type="text" class="form-control" placeholder="" name="nama_pelanggan" value="" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">No Hp Pelanggan :</label>
                    <input type="text" class="form-control" placeholder="" name="no_hp_pelanggan" value="" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Alamat Pelanggan:</label>
                    <input type="text" class="form-control" placeholder="" name="alamat_pelanggan" value="" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Kota Pelanggan :</label>
                    <input type="text" class="form-control" placeholder="" name="kota_pelanggan" value="" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Level :</label>
                    <input type="text" class="form-control" placeholder="" name="level" value="" >
                </div>

                    <input type="submit" name="submit" class="btn btn-primary btn-sm mb-lg-4 mt-lg-4" value="Tambah"></input>
                    </div>
                </center>
                <?=  form_close(); ?>
                </form>
                

                <!-- akhir isi modal -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  

<!-- akhir modal Tambah  ============================================================== -->

<!-- Awal modal Edit ============================================================== -->
<?php foreach ($tampil as $row): ?>

    <div class="modal fade bs-example-modal-lg" id="editModal<?= $row->id_pelanggan ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Edit Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- awal isi modal -->
                <?= form_open('Admin/pelanggan_edit_up'); ?>
                <form class="m-t-40" novalidate>

                <div class="form-group">
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
                        <h4 class="mb-sm-0 font-size-18">Data Pelanggan</h4>
                        
                        <?= $this->session->flashdata('msg') ?>
                    </div>
                </div>
            </div>
            <!-- end page title -->
               
           <div class="row">
                <div class="col-12 mb-2">

                    <div class="d-flex gap-2 flex-wrap mb-1">
                        <button type="button" class="btn btn-info btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="bx bx-plus"></i>Tambah</button>
                    </div>  

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">  
                        <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Pelanggan</th> 
                                    <th><center>No Hp Pelanggan</th> 
                                    <th><center>Alamat Pelanggan</th> 
                                    <th><center>Kota Pelanggan</th> 
                                    <th><center>Level</th> 
                                    <th><center>Pilihan</th>
                                </tr>
                            </thead>

                        
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
            "paging": false,  // Matikan paginasi
            "searching": false,  // Matikan fitur pencarian
            "info": false,  // Matikan informasi
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                //panggil method ajax list dengan ajax
                "url": "<?= site_url('Ajax/ajax_pelanggan') ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 1,2,3,4,5,6],
                    "className" : 'text-center'
                },
                 // mematikan sort kolom pilihan
                {
                    "targets": [6], 
                    "orderable": false
                }
            ]
        });
    </script>