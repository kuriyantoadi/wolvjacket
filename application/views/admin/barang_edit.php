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
                            <h4 class="card-title">Edit barang</h4>
                        </div>
                        <div class="card-body">
                        
                        
                        <div class="row">
                            <?= $this->session->flashdata('msg') ?>

                            <div class="col-12">

                            <?=
                            form_open('index.php/Admin/barang_edit_up');
                            foreach ($tampil as $row) {

                            ?>
                            <form class="m-t-40" novalidate>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Nama Barang :</label>
                                <input type="text" class="form-control" placeholder="" name="nama_barang" value="<?= $row->nama_barang ?>" required>
                                <input type="hidden" class="form-control" placeholder="" name="id_barang" value="<?= $row->id_barang ?>" >
                            </div>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Brand :</label>
                                   <select name="id_brand" id="" class="form-control" required>
                                        
                                        <option value="<?= $row->id_brand ?>">Pilihan Awal ( <?= $row->nama_brand ?> )</option>

                                        <?php foreach ($tampil_brand as $row_brand) { ?>
                                        <option value="<?= $row_brand->id_brand ?>"><?= $row_brand->nama_brand ?></option>
                                        
                                         <?php } ?>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Kategori Barang :</label>
                                   <select name="id_kategori_barang" id="" class="form-control" required>
                                        <option value="<?= $row->id_kategori_barang ?>">Pilihan Awal ( <?= $row->nama_kategori_barang ?> )</option>
                               
                                        <?php foreach ($tampil_kategori as $row_kategori) { ?>
                                        <option value="<?= $row_kategori->id_kategori_barang ?>"><?= $row_kategori->nama_kategori_barang ?></option>
                                        
                                         <?php } ?>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Harga Pokok :</label>
                                <input type="number" class="form-control" placeholder="" value="<?= $row->harga_pokok ?>" name="harga_pokok" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Harga Jual :</label>
                                <input type="number" class="form-control" placeholder="" value="<?= $row->harga_jual ?>" name="harga_jual" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Stok :</label>
                                <input type="number" class="form-control" value="<?= $row->stok ?>" placeholder="" name="stok" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Status :</label>
                                   <select name="status" id="" class="form-control" required>
                                        <option value="<?= $row->status ?>">Pilihan Awal ( <?= $row->status ?> )</option>
                                        
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak Ada</option>

                                        
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
