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
                               <a href="<?= site_url('Admin/siswa_tambah') ?>" type="button" class="btn btn-info btn-sm mb-1">Tambah</a>
                                <br>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <!-- <a href="<?= site_url('Admin/siswa_tampil') ?>" type="button" class="btn btn-primary btn-sm">Semua Jurusan</a> -->
                                    <a href="<?= site_url('Admin/siswa_jur/AKL') ?>" type="button" class="btn btn-primary btn-sm">AKL</a>
                                    <a href="<?= site_url('Admin/siswa_jur/MPLB') ?>" type="button" class="btn btn-primary btn-sm">MPLB</a>
                                    <a href="<?= site_url('Admin/siswa_jur/TJKT') ?>" type="button" class="btn btn-primary btn-sm">TJKT</a>
                                    <a href="<?= site_url('Admin/siswa_jur/PPLG') ?>" type="button" class="btn btn-primary btn-sm">PPLG</a>
                                    <a href="<?= site_url('Admin/siswa_jur/TKR') ?>" type="button" class="btn btn-primary btn-sm">TKR</a>
                                    <a href="<?= site_url('Admin/siswa_jur/TPM') ?>" type="button" class="btn btn-primary btn-sm">TPM</a>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Siswa</th>
                                    <th><center>NISN</th>
                                    <th><center>kelas</th>
                                    <!-- <th><center>Pass</th> -->
                                    <!-- <th><center>Vote</th> -->
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
                                    <td><?= $row->nama_siswa ?> </td>
                                    <td><center><?= $row->nisn_siswa ?></td>
                                    <td><center><?= $row->tingkatan ?> <?= $row->kode_jurusan ?> <?= $row->kode_kelas ?></td>
                                    <!-- <td><center>
                                            <?php 
                                            if($row->password ==  sha1($row->nisn_siswa)){
                                                echo "Benar";
                                            }else{
                                                echo "Salah";
                                            }

                                        ?>
                                    </td> -->
                                    <!-- <td><center>
                                        <?php if($row->vote_status == 'Selesai'){ ?>
                                            <a type="button" class="btn btn-success waves-effect waves-light btn-sm"><i class="bx bx-check-circle"></i></a>
                                        <?php }else{ ?>
                                            <a type="button" class="btn btn-danger waves-effect waves-light btn-sm"><i class="bx bx-x"></i></a>
                                        <?php } ?>  
                                    </td> -->
                                    
                                    <td><center>
                                        <a type="button" class="btn btn-danger waves-effect waves-light btn-sm" title="hapus"
                                        href="<?= base_url() ?>Admin/siswa_hapus/<?= $row->id_siswa ?>" onclick="return confirm('Anda yakin menghapus data siswa <?= $row->nama_siswa ?> ?')">

                                           <i class="bx bx-trash"></i>
                                        </a>
                                        <a type="button" class="btn btn-warning waves-effect waves-light btn-sm" title="Password"
                                        href="<?= site_url('index.php/Admin/siswa_pass/'.$row->id_siswa) ?>" >
                                          <i class="bx bx-key"></i>
                                        </a>
                                        <a type="button" class="btn btn-primary waves-effect waves-light btn-sm" title="Edit"
                                        href="<?= site_url('index.php/Admin/siswa_edit/'.$row->id_siswa) ?>">
                                          <i class="bx bx-pencil"></i>
                                        </a>
                                        <!-- <a type="button" class="btn btn-info waves-effect waves-light btn-sm" title="Lihat"
                                        href="<?= site_url('index.php/Admin/kelas_tampil/'.$row->id_siswa) ?>" >
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
