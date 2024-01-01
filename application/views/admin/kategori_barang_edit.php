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
                            <h4 class="card-title">Edit Kategori Barang</h4>
                        </div>
                        <div class="card-body">
                        
                        
                        <div class="row">
                            <?= $this->session->flashdata('msg') ?>

                            <div class="col-12">

                            <?=
                            form_open('index.php/Admin/kategori_barang_edit_up');
                            foreach ($tampil as $row) {

                            ?>
                            <form class="m-t-40" novalidate>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Nama Kategori Barang :</label>
                                <input type="text" class="form-control" placeholder="" name="nama_kategori_barang" value="<?= $row->nama_kategori_barang ?>" required>
                                <input type="hidden" class="form-control" placeholder="" name="id_kategori_barang" value="<?= $row->id_kategori_barang ?>" >
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
