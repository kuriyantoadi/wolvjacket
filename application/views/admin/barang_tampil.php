<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Barang</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            

            <div class="row">
                <div class="col-xl-6">
    
                    <div class="card-body">

                        <div class="row g-4 mb-2">
                            <?= $this->session->flashdata('msg') ?>
                        </div><!-- end row -->

                        <div class="d-flex gap-2 flex-wrap mb-1">
                            <a class="btn btn-info btn-sm" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Tambah barang
                            </a>
                        </div>

                        <div class="collapse hide" id="collapseExample">
                            <div class="card border shadow-none card-body text-muted mb-0">

                            <?=
                            form_open('Admin/barang_tambah_up');

                            ?>
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
                                <input type="number" class="form-control" placeholder="" name="harga_jual" value="" required>
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

                                <input type="submit" name="submit" class="btn btn-primary btn-sm mb-lg-4 mt-lg-4"></input>
                                </div>
                            </center>
                            <?= 
                            form_close();
                            
                            ?>
                            </form>
                        


                           </div>
                        </div>
                    </div><!-- end card-body -->
                  
                </div><!-- end col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">  
                        <div class="card-body">

                        

                        <table id="tableBarang" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
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
        $('#tableBarang').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
            },
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