<!-- awal modal Tambah Barang ============================================================== -->

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Kategori Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <!-- awal isi modal -->
                    <?= form_open('Admin/kategori_barang_tambah_up'); ?>
                    <form class="m-t-40" novalidate>

                        <div class="form-group">
                            <label class="control-label mt-3" for="email">Nama Kategori Barang :</label>
                            <input type="text" class="form-control" placeholder="" name="nama_kategori_barang" value="" required>
                        </div>

                            <input type="submit" name="submit" class="btn btn-primary btn-sm mb-lg-4 mt-lg-4" value="Tambah"></input>
                            </div>
                        </center>
                        <?= form_close(); ?>
                    </form>
                    
                    <!-- akhir isi modal -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  

<!-- akhir modal Tambah Barang ============================================================== -->

<!-- Awal modal Edit Barang ============================================================== -->
<?php foreach ($tampil as $row): ?>

    <div class="modal fade bs-example-modal-lg" id="editModal<?= $row->id_kategori_barang ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Edit Kategori Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <!-- awal isi modal -->

                            <div class="col-12">

                            <?= form_open('index.php/Admin/kategori_barang_edit_up'); ?>
                           
                            <form class="m-t-40" novalidate>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Nama Kategori Barang :</label>
                                <input type="text" class="form-control" placeholder="" name="nama_kategori_barang" value="<?= $row->nama_kategori_barang ?>" required>
                                <input type="hidden" class="form-control" placeholder="" name="id_kategori_barang" value="<?= $row->id_kategori_barang ?>" >
                            </div>

                                <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary mb-lg-4 mt-lg-4">Update</button>
                                </div>
                            </center>
                            <?= form_close(); ?>
                            </form>
                    <!-- akhir isi modal -->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  
<?php endforeach; ?>
<!-- Akhir modal Edit Barang ============================================================== -->


<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Kategori Barang</h4>
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
                                    <th><center>Nama Kategori Barang</th> 
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
                "url": "<?= site_url('Ajax/ajax_kategori_barang') ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 1,2],
                    "className" : 'text-center'
                },
                // mematikan sort kolom pilihan
                {
                    "targets": [2], 
                    "orderable": false
                }
            ]
        });
    </script>