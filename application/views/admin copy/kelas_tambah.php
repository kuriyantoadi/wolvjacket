
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
                            <h4 class="card-title">Tambah Kelas</h4>
                        </div>
                        <div class="card-body">
                        
                        
                        <div class="row">
                            
                            <div class="col-12">

                            <?=
                            form_open('index.php/Admin/kelas_tambah_up');

                            ?>
                            <form class="m-t-40" novalidate>

                            <div class="form-group">
                                <label class="control-label mt-3" for="email">Tingkat :</label>
                                    <select class="form-control" name="tingkatan" required>
                                        <option value="">Pilihan</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                            </div>

                             <div class="form-group">
                                <label class="control-label mt-3" for="email">Nama Jurusan :</label>
                                    <select class="form-control" name="nama_jurusan" required>
                                        <option value="">Pilihan</option>
                                        <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                                        <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                        <option value="Teknik Jaringan Komputer dan Telekomunikasi">Teknik Jaringan Komputer dan Telekomunikasi</option>
                                        <option value="Pengembangan Perangkat Lunak dan GIM">Pengembangan Perangkat Lunak dan GIM</option>
                                        <option value="Akuntansi dan Keuangan Lembaga">Akuntansi dan Keuangan Lembaga</option>
                                        <option value="Manajemen Perkantoran Dan Layanan Bisnis">Manajemen Perkantoran Dan Layanan Bisnis</option>
                                    </select>
                            </div>

                              <div class="form-group">
                                <label class="control-label mt-3" for="email">Kode Jurusan :</label>
                                    <select class="form-control" name="kode_jurusan" required>
                                        <option value="">Pilihan</option>
                                        <option value="TPM">TPM</option>
                                        <option value="TKR">TKR</option>
                                        <option value="TJKT">TJKT</option>
                                        <option value="PPLG">PPLG</option>
                                        <option value="AKL">AKL</option>
                                        <option value="MPLB">MPLB</option>
                                    </select>
                            </div>


                              <div class="form-group">
                                <label class="control-label mt-3" for="email">Kode Kelas :</label>
                                    <select class="form-control" name="kode_kelas" required>
                                        <option value="">Pilihan</option>
                                        <?php for ($i = 1; $i <= 4; $i++) { ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php } ?>
                                        
                                    </select>
                            </div>

                            

                                <input type="submit" name="submit" class="btn btn-primary mb-lg-4 mt-lg-4"></input>
                                </div>
                            </center>
                            <?= 
                            form_close();
                            
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
