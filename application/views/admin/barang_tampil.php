<!-- awal modal Tambah Barang ============================================================== -->

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <!-- awal isi modal -->
                    <?= form_open('Admin/barang_tambah_up'); ?>
                    <form class="m-t-40" novalidate>

                    <div class="form-group">
                        <label class="control-label mt-3" for="email">Nama Barang :</label>
                        <input type="text" class="form-control" placeholder="" name="nama_barang" value="" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label mt-3" for="email">Brand :</label>
                        <select name="id_brand" id="" class="form-control" required>
                            <option value="">Pilihan </option>
                    
                                <?php foreach ($tampil_brand as $row_brand) { ?>
                                <option value="<?= $row_brand->id_brand ?>"><?= $row_brand->nama_brand ?></option>
                                
                                <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label mt-3" for="email">Kategori Barang :</label>
                        <select name="id_kategori_barang" id="" class="form-control" required>
                            <option value="">Pilihan </option>
                    
                                <?php foreach ($tampil_kategori as $row_kategori) { ?>
                                <option value="<?= $row_kategori->id_kategori_barang ?>"><?= $row_kategori->nama_kategori_barang ?></option>
                                
                                <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label mt-3" for="email">Harga Pokok :</label>
                        <input type="number" class="form-control" placeholder="" name="harga_pokok" value="" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label mt-3" for="email">Harga Jual :</label>
                        <input type="text" class="form-control" id="currency-mask">
                        <input type="text" class="form-control" placeholder="" name="harga_jual" value="" id="currency-mask" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label mt-3" for="email">Stok :</label>
                        <input type="number" class="form-control" placeholder="" name="stok" value="" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label mt-3" for="email">Status :</label>
                            <select name="status" id="" class="form-control" required>
                                <option value="Ada">Ada </option>
                                <option value="Tidak Ada">Tidak Ada </option>
                            </select>
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

<!-- akhir modal Tambah Barang ============================================================== -->

<!-- Awal modal Edit Barang ============================================================== -->
<?php foreach ($tampil as $row): ?>

    <div class="modal fade bs-example-modal-lg" id="editModal<?= $row->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <!-- awal isi modal -->
                    <?= form_open('index.php/Admin/barang_edit_up'); ?>
                   
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

                                <button type="submit" name="submit" value="Update" class="btn btn-primary mb-lg-4 mt-lg-4">Update</button>
                                </div>
                            </center>
                            <?= form_close();  ?>
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
                        <h4 class="mb-sm-0 font-size-18">Data Barang</h4>

                        <?= $this->session->flashdata('msg') ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-2">
                    
                    <div class="d-flex gap-2 flex-wrap mb-1">
                        <button type="button" class="btn btn-info btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Tambah</button>
                    </div>  

                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">  
                        <div class="card-body">
                                            

                        <!-- <table id="tableBarang" id="datatable" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100"> -->
                        <table id="datatable" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Barang</th> 
                                    <th><center>Brand</th>
                                    <th><center>Kategori</th>
                                    <th><center>Harga Pokok</th>
                                    <th><center>Harga Jual</th>
                                    <th><center>Stok</th>
                                    <th><center>Status</th>
                                    <th><center>Pilihan</th>
                                </tr>
            
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
            
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                //panggil method ajax list dengan ajax
                "url": "<?= site_url('Ajax/ajax_barang') ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 2,3,4,5,6,7],
                    "className" : 'text-center'
                }
            ]
        });

         
    </script>

<!-- form mask -->
<script src="<?= base_url() ?>assets/libs/imask/imask.min.js"></script>

<!-- form mask init -->
<script src="<?= base_url() ?>assets/js/pages/form-mask.init.js"></script>

<script src="<?= base_url() ?>assets/js/app.js"></script>
