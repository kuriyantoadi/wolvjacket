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
                            <h4 class="card-title">Edit Siswa</h4>
                        </div>
                        <div class="card-body">
                        
                        
                        <div class="row">
                            
                            <div class="col-12">

                            <?=
                            form_open('Admin/siswa_edit_up');
                            foreach ($tampil as $row) {

                            ?>
                            <form class="m-t-40" novalidate>

                             <div class="form-group">
                                <label class="control-label mt-3" for="email">NISN Siswa :</label>
                                <input type="text" class="form-control" placeholder="" name="nisn_siswa" value="<?= $row->nisn_siswa ?>" required>
                                <input type="hidden" class="form-control" placeholder="" name="id_siswa" value="<?= $row->id_siswa ?>" required readonly>
                            </div>
  
                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Nama Siswa :</label>
                                <input type="text" class="form-control" placeholder="" name="nama_siswa" value="<?= $row->nama_siswa ?>" required>
                            </div>

                            <div class="form-group">
                            <label class="control-label mt-3" for="email">Kelas :</label>
                            <select name="id_kelas" id="" class="form-control" required>
                                <option value="<?= $row->id_kelas ?>">Pilihan Sebelumnya (<?= $row->tingkatan ?> <?= $row->kode_jurusan ?> <?= $row->kode_kelas ?>) </option>
                               
                                <?php foreach ($tampil_kelas as $row_kelas) { ?>
                                <option value="<?= $row_kelas->id_kelas ?>"><?= $row_kelas->tingkatan ?> <?= $row_kelas->kode_jurusan ?> <?= $row_kelas->kode_kelas ?></option>
                                
                                <?php } ?>
                            </select>
                            </div>


                                <button type="submit" name="" value="" class="btn btn-primary mb-lg-4 mt-lg-4">Submit</button>
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
