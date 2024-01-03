<!-- ============================================================== -->

<!-- awal modal Tambah Barang ============================================================== -->

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- awal isi modal -->
                
                <?= form_open('Admin/pengguna_tambah_up'); ?>
                <form class="m-t-40" novalidate>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Nama Pengguna :</label>
                    <input type="text" class="form-control" placeholder="" name="nama_pengguna" value="" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Username :</label>
                    <input type="text" class="form-control" placeholder="" name="username" value="" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Password :</label>
                    <input type="text" class="form-control" placeholder="" name="password" value="" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Ototoritas :</label>
                        <select name="status" id="" class="form-control" required>
                            <option value="">Pilihan</option>
                            <option value="admin">admin </option>
                            <option value="kasir">kasir </option>
                        </select>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Status User :</label>
                        <select name="status_user" id="" class="form-control" required>
                            <option value="Aktif">Aktif </option>
                            <option value="Tidak Aktif">Tidak Aktif </option>
                        </select>
                </div>

                    <input type="submit" name="submit" class="btn btn-primary btn-sm mb-lg-4 mt-lg-4"></input>
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

    <div class="modal fade bs-example-modal-lg" id="editModal<?= $row->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Edit Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- awal isi modal -->
                <?= form_open('index.php/Admin/pengguna_edit_up'); ?>
                <form class="m-t-40" novalidate>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Nama Pengguna :</label>
                    <input type="text" class="form-control" placeholder="" name="nama_pengguna" value="<?= $row->nama_pengguna ?>" required>
                    <input type="hidden" class="form-control" placeholder="" name="id_user" value="<?= $row->id_user ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Username :</label>
                    <input type="text" class="form-control" placeholder="" name="username" value="<?= $row->username ?>" required>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Status :</label>
                        <select name="status" id="" class="form-control" required>
                            <option value="<?= $row->status ?>">Pilihan Awal ( <?= $row->status ?> )</option>
                            <option value="admin">admin </option>
                            <!-- <option value="Kasir">Kasir </option> -->
                        </select>
                </div>

                <div class="form-group">
                    <label class="control-label mt-3" for="email">Status User :</label>
                        <select name="status_user" id="" class="form-control" required>
                            <option value="<?= $row->status_user ?>">Pilihan Awal ( <?= $row->status_user ?> )</option>
                            <option value="Aktif">Aktif </option>
                            <option value="Tidak Aktif">Tidak Aktif </option>
                        </select>
                </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary mb-lg-4 mt-lg-4">Submit</button>
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
                        <h4 class="mb-sm-0 font-size-18">Data Pengguna</h4>
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

                        <table id="tableAjax" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Pengguna</th>
                                    <th><center>Username</th> 
                                    <th><center>Ototoritas</th> 
                                    <th><center>Status User</th>  
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
        $('#tableAjax').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
            },
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                //panggil method ajax list dengan ajax
                "url": "<?= site_url('Ajax/ajax_pengguna') ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 1,2,3,4,5],
                    "className" : 'text-center'
                }
            ]
        });
    </script>