<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Kelas</h4>
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
                               
                                <a href="<?= site_url('index.php/Admin/kelas_tambah') ?>" type="button" class="btn btn-info btn-sm mb-1">Tambah</a>

                            </div><!-- end col -->
                        </div><!-- end row -->

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Tingkat</th>
                                    <th><center>Jurusan</th>
                                    <th><center>Kode</th>
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
                                    <td><?= $row->tingkatan ?></td>
                                    <td><center><?= $row->kode_jurusan ?></td>
                                    <td><center><?= $row->kode_kelas ?></td>
                                   <!-- <td><center>
                                    <?php if($row->status_verifikasi == 'Data Sesuai' ){ ?>
                                             <a class="btn-success waves-effect waves-light btn-sm btn-sm btn-rounded">Sesuai</a>
                                        <?php }elseif($row->status_verifikasi == 'Proses'){ ?>
                                             <a class="btn-info waves-effect waves-light btn-sm btn-sm btn-rounded">Proses</a>
                                        <?php }elseif($row->status_verifikasi == 'Tidak Sesuai'){ ?>
                                            <a class="btn-danger waves-effect waves-light btn-sm btn-sm btn-rounded">Tidak Sesuai</a>
                                        <?php }else{ ?>
                                            <a class="btn-secondary btn-sm btn-rounded">Kosong</a>
                                        <?php } ?>
                                    </td> -->
                                    
                                    <td><center>
                                        <a type="button" class="btn btn-danger waves-effect waves-light btn-sm" title="hapus"
                                        href="<?= site_url('index.php/Admin/kelas_hapus/'.$row->id_kelas) ?>" onclick="return confirm('Anda yakin menghapus data kelas <?= $row->tingkatan ?> <?= $row->kode_jurusan ?> <?= $row->kode_kelas ?> ?')">
                                          <i class="bx bx-trash"></i>
                                        </a>
                                        <a type="button" class="btn btn-primary waves-effect waves-light btn-sm" title="Edit"
                                        href="<?= site_url('index.php/Admin/siswa_edit/'.$row->id_kelas) ?>">
                                          <i class="bx bx-pencil"></i>
                                        </a>
                                        <!-- <a type="button" class="btn btn-info waves-effect waves-light btn-sm" title="Lihat"
                                        href="<?= site_url('index.php/Admin/kelas_tampil/'.$row->id_kelas) ?>" >
                                          <i class="bx bx-search"></i>
                                        </a> -->
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
