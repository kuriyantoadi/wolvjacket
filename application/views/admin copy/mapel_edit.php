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
                            <h4 class="card-title">Edit Mapel</h4>
                        </div>
                        <div class="card-body">
                        
                        
                        <div class="row">
                            
                            <div class="col-12">

                            <?=
                            form_open('Admin/mapel_edit_up');
                            foreach ($tampil as $row) {

                            ?>
                            <form class="m-t-40" novalidate>

                             <div class="form-group">
                                <label class="control-label mt-3" for="email">Nama Mapel Awal :</label>
                                <input type="text" class="form-control" placeholder="" name="" value="<?= $row->nama_mapel ?>" required readonly>
                                <input type="hidden" class="form-control" placeholder="" name="id_mapel" value="<?= $row->id_mapel ?>" required readonly>
                            </div>

                             <div class="form-group">
                                <label class="control-label mt-3" for="email">Nama Mapel Update:</label>
                                <input type="text" class="form-control" placeholder="" name="nama_mapel" value="<?= $row->nama_mapel ?>" required>
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
