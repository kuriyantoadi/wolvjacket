<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Guru</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">  
                        <div class="card-body">

                        <div class="row g-4 mb-2">

                            <div class="col-md-6 ">
                                <?= $this->session->flashdata('msg') ?>
                               
                                <a href="<?= site_url('index.php/Admin/guru_tambah') ?>" type="button" class="btn btn-info btn-sm mb-1">Tambah</a>

                            </div><!-- end col -->
                        </div><!-- end row -->

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Photo</th>
                                    <th><center>Nama Guru</th>
                                    <th><center>Mapel</th>
                                    <th><center>Opsi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($tampil as $row) {
                                ?>
                                <tr>
                                    <td><center><?= $no++ ?></td>
                                    <td>
                                        <img src="<?= base_url() ?>/assets/photo_upload/<?= $row->photo_guru ?>" alt="kosong" width="100px">
                                    </td>
                                    <td><?= $row->nama_guru ?></td>
                                    <td><center>
                                        <?php
                                         if(empty($row->nama_mapel)){
                                            echo "Kosong";
                                         }else{
                                            echo $row->nama_mapel;
                                         }
                                        ?>
                                    </td>
                                   
                                    
                                    <td><center>
                                        <a type="button" class="btn btn-danger waves-effect waves-light btn-sm" title="hapus"
                                        href="<?= site_url('index.php/Admin/guru_hapus/'.$row->id_guru) ?>" onclick="return confirm('Anda yakin menghapus data guru <?= $row->nama_guru ?>  ?')">
                                          <i class="bx bx-trash"></i>
                                        </a>
                                        
                                        <a type="button" class="btn btn-info waves-effect waves-light btn-sm" title="Edit Photo"
                                        href="<?= site_url('index.php/Admin/guru_edit_photo/'.$row->id_guru) ?>">
                                          <i class="bx bx-photo-album"></i>
                                        </a>

                                        <a type="button" class="btn btn-primary waves-effect waves-light btn-sm" title="Edit"
                                        href="<?= site_url('index.php/Admin/guru_edit/'.$row->id_guru) ?>">
                                          <i class="bx bx-pencil"></i>
                                        </a>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                            
                            </table>
                                                

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <!-- <?php include 'admin-layouts/footer.php'; ?> -->
