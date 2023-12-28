
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
                            <h4 class="card-title">Tambah Mapel</h4>
                        </div>
                        <div class="card-body">
                        
                        
                        <div class="row">
                            
                            <div class="col-12">

                            <?=
                            form_open('index.php/Admin/mapel_tambah_up');

                            ?>
                            <form class="m-t-40" novalidate>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Nama Mapel :</label>
                                <input type="text" class="form-control" placeholder="" name="nama_mapel" value="" required>
                            </div>

                                <input type="submit" name="submit" class="btn btn-primary mb-lg-4 mt-lg-4"></input>
                                </div>
                            </center>
                            <?= 
                            form_close();
                            
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
