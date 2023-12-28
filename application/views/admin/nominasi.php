<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Nominasi</h4>
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
                               <!-- <a href="<?= site_url('Admin/siswa_tambah') ?>" type="button" class="btn btn-info btn-sm mb-1">Tambah</a> -->
                                <br>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <!-- <a href="<?= site_url('Admin/siswa_tampil') ?>" type="button" class="btn btn-primary btn-sm">Semua Jurusan</a> -->
                                    <a href="<?= site_url('Admin/nominasi/AKL') ?>" type="button" class="btn btn-primary btn-sm">AKL</a>
                                    <a href="<?= site_url('Admin/nominasi/MPLB') ?>" type="button" class="btn btn-primary btn-sm">MPLB</a>
                                    <a href="<?= site_url('Admin/nominasi/TJKT') ?>" type="button" class="btn btn-primary btn-sm">TJKT</a>
                                    <a href="<?= site_url('Admin/nominasi/PPLG') ?>" type="button" class="btn btn-primary btn-sm">PPLG</a>
                                    <a href="<?= site_url('Admin/nominasi/TKR') ?>" type="button" class="btn btn-primary btn-sm">TKR</a>
                                    <a href="<?= site_url('Admin/nominasi/TPM') ?>" type="button" class="btn btn-primary btn-sm">TPM</a>
                                </div>

                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <!-- <a href="<?= site_url('Admin/siswa_tampil') ?>" type="button" class="btn btn-primary btn-sm">Semua Jurusan</a> -->
                                    <a href="<?= site_url('Admin/nominasi/pai') ?>" type="button" class="btn btn-info btn-sm">PAI</a>
                                    <a href="<?= site_url('Admin/nominasi/b.indo') ?>" type="button" class="btn btn-info btn-sm">B. Indo</a>
                                    <a href="<?= site_url('Admin/nominasi/b.ing') ?>" type="button" class="btn btn-info btn-sm">B. Ing</a>
                                    <a href="<?= site_url('Admin/nominasi/bk') ?>" type="button" class="btn btn-info btn-sm">BK</a>
                                    <a href="<?= site_url('Admin/nominasi/sejindo') ?>" type="button" class="btn btn-info btn-sm">SEJINDO</a>
                                    <a href="<?= site_url('Admin/nominasi/pkk') ?>" type="button" class="btn btn-info btn-sm">PKK</a>
                                    <a href="<?= site_url('Admin/nominasi/mtk') ?>" type="button" class="btn btn-info btn-sm">MTK</a>
                                    <a href="<?= site_url('Admin/nominasi/senbud') ?>" type="button" class="btn btn-info btn-sm">SENBUD</a>
                                    <a href="<?= site_url('Admin/nominasi/ipas') ?>" type="button" class="btn btn-info btn-sm">IPAS</a>
                                    <a href="<?= site_url('Admin/nominasi/pkn') ?>" type="button" class="btn btn-info btn-sm">PKN</a>
                                    <a href="<?= site_url('Admin/nominasi/pjok') ?>" type="button" class="btn btn-info btn-sm">PJOK</a>

                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Guru</th>
                                    <th><center>Nama mapel</th>
                                    <th><center>Total Vote</th>
                                    <!-- <th><center>Opsi</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($tampil as $row) {
                                ?>
                                <tr>
                                    <td><center><?= $no++ ?></td>
                                    <td><?= $row->nama_guru ?></td>
                                    <td><center><?= $row->nama_mapel ?></td>
                                    <td><center><?= $row->hasil_vote ?></td>
                                    
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
