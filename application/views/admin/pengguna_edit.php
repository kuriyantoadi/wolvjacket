<!-- <?php include 'admin-layouts/header.php'; ?> -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">  
                        
                        <div class="card-header">
                            <h4 class="card-title">Edit Pengguna</h4>
                        </div>
                        <div class="card-body">
                        
                        
                        <div class="row">
                            <?= $this->session->flashdata('msg') ?>

                            <div class="col-12">

                            <?=
                            form_open('index.php/Admin/pengguna_edit_up');
                            foreach ($tampil as $row) {

                            ?>
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
                            <?= 
                            form_close();
                            }
                            ?>
                            </form>
                           
                        
                        </div>
                    </div>

                        </div> <!-- container -->
                        
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <!-- <?php include 'admin-layouts/footer.php'; ?> -->
