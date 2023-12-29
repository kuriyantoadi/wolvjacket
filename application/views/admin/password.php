
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
                            <h4 class="card-title">Ganti Password</h4>
                        </div>
                        <div class="card-body">
                        
                        
                        <div class="row">
                            
                            <div class="col-12">

                            <?php
                            form_open('index.php/Admin/password_up');
                            foreach ($tampil as $row) {
                               
                            ?>
                            <form class="m-t-40" novalidate>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Username</label>
                                <input type="hidden" class="form-control" name="id_user" value="<?= $row->id_user ?>" readonly>     
                                <input type="text" class="form-control" value="<?= $row->username ?>" readonly>     
                            </div>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Password Baru</label>
                                <input type="password" name="password_baru" class="form-control" value="" >     
                            </div>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Password Konfirmasi</label>
                                <input type="password" name="password_konfirmasi" class="form-control" value="" >     
                            </div>

                            <input type="submit" name="submit" class="btn btn-primary mb-lg-4 mt-lg-4"></input>
                                </div>
                            </center>
                            <?php } ?>
                            <?=  form_close(); ?>
                            </form>

                        </div> <!-- container -->
                        
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <!-- <?php include 'admin-layouts/footer.php'; ?> -->
