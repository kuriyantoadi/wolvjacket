<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Siswa</h4>
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
                               <!-- <a href="<?= site_url('index.php/Admin/siswa_tambah') ?>" type="button" class="btn btn-info btn-sm mb-1">Tambah</a> -->
                                <br>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="<?= site_url('index.php/Admin/siswa_tampil') ?>" type="button" class="btn btn-primary btn-sm">Semua Jurusan</a>
                                    <a href="<?= site_url('index.php/Admin/siswa_akl') ?>" type="button" class="btn btn-primary btn-sm">AKL</a>
                                    <a href="<?= site_url('index.php/Admin/siswa_mplb') ?>" type="button" class="btn btn-primary btn-sm">MPLB</a>
                                    <a href="<?= site_url('index.php/Admin/siswa_tjkt') ?>" type="button" class="btn btn-primary btn-sm">TJKT</a>
                                    <a href="<?= site_url('index.php/Admin/siswa_pplg') ?>" type="button" class="btn btn-primary btn-sm">PPLG</a>
                                    <a href="<?= site_url('index.php/Admin/siswa_to') ?>" type="button" class="btn btn-primary btn-sm">TO</a>
                                    <a href="<?= site_url('index.php/Admin/siswa_tm') ?>" type="button" class="btn btn-primary btn-sm">TM</a>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>NISN</th>
                                    <th><center>Nama Lengkap</th>
                                    <th><center>Kompetensi</th>
                                    <th><center>Kelas</th>
                                    <th><center>Verifikasi</th>
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
                                    <td><?= $row->nama_siswa ?></td>
                                    <td><center><?= $row->short_kompetensi_1 ?></td>
                                    <td><center><?= $row->asal_sekolah ?></td>
                                   <td><center>
                                    <?php if($row->status_verifikasi == 'Data Sesuai' ){ ?>
                                             <a class="btn-success waves-effect waves-light btn-sm btn-sm btn-rounded">Sesuai</a>
                                        <?php }elseif($row->status_verifikasi == 'Proses'){ ?>
                                             <a class="btn-info waves-effect waves-light btn-sm btn-sm btn-rounded">Proses</a>
                                        <?php }elseif($row->status_verifikasi == 'Tidak Sesuai'){ ?>
                                            <a class="btn-danger waves-effect waves-light btn-sm btn-sm btn-rounded">Tidak Sesuai</a>
                                        <?php }else{ ?>
                                            <a class="btn-secondary btn-sm btn-rounded">Kosong</a>
                                        <?php } ?>
                                    </td>
                                    
                                    <td><center>
                                        <a type="button" class="btn btn-danger waves-effect waves-light btn-sm" title="hapus"
                                        href="<?= site_url('index.php/Admin/siswa_hapus/'.$row->id_siswa) ?>" onclick="return confirm('Anda yakin menghapus data siswa <?= $row->nama_siswa ?> ?')">
                                          <i class="bx bx-trash"></i>
                                        </a>
                                        <a type="button" class="btn btn-primary waves-effect waves-light btn-sm" title="Edit"
                                        href="<?= site_url('index.php/Admin/siswa_edit/'.$row->id_siswa) ?>">
                                          <i class="bx bx-pencil"></i>
                                        </a>
                                        <a type="button" class="btn btn-info waves-effect waves-light btn-sm" title="Lihat"
                                        href="<?= site_url('index.php/Admin/siswa_detail/'.$row->id_siswa) ?>" >
                                          <i class="bx bx-search"></i>
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
