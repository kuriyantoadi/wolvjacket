<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Pengguna</h4>
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
                                Tambah Pengguna
                            </a>
                        </div>

                        <div class="collapse hide" id="collapseExample">
                            <div class="card border shadow-none card-body text-muted mb-0">

                            <?=
                            form_open('Admin/pengguna_tambah_up');

                            ?>
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