<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Nominasi Guru</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        <div class="container-fluid">


        <!--  awal mapel umum -->
        <?php
        $no = 1;
        foreach ($tampil as $row) {
        $nama_mapel = $row->nama_mapel;
        ?>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <h2 class="card-title">Guru Terbaik <?=$nama_mapel ?></h2>
                        <div class="table-responsive m-t-20">
                            <div class="m-b-40">
                                <p>
                                    Silahkan pilih guru <?=$nama_mapel ?> terbaik menurut kalian
                                </p>
                                <a href="vote/<?= $row->id_mapel ?>" class="btn btn-primary btn-sm">Vote Guru <?=$nama_mapel ?></a>
                                
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <?php } ?>
        <!--  akhir mapel umum -->


        <!--  awal mapel produktif -->
        <?php
        $no = 1;
        foreach ($tampil_produktif as $row) {
        $nama_mapel = $row->nama_mapel;
        ?>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <h2 class="card-title">Guru Terbaik <?=$nama_mapel ?></h2>
                        <div class="table-responsive m-t-20">
                            <div class="m-b-40">
                                <p>
                                    Silahkan pilih guru <?=$nama_mapel ?> terbaik menurut kalian
                                </p>
                                <a href="vote/<?= $row->id_mapel ?>" class="btn btn-primary btn-sm">Vote Guru <?=$nama_mapel ?></a>
                                
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <?php } ?>
        <!--  akhir mapel produktif -->

        <table class="table table-bordered">
            <tr>
                <th><center>Nominasi</th>
                <th><center>Sudah di Vote</th>
                <th><center>Belum di Vote</th>
                <th><center>Status Vote</th>
            </tr>
            <tr>
                <td><center><?= $jml_nominasi ?></td>
                <td><center>
                    <?php
                    foreach ($jml_vote as $row) {

                        if($row->hasil_vote == NULL){
                            $hasil_vote = 0;
                            echo $hasil_vote;
                        }else{
                            $hasil_vote = $row->hasil_vote;
                            echo $hasil_vote;
                        }
                       
                    }
                    ?>
                </td>
                <td><center>

                <?php
                $jml_belum = $jml_nominasi-$hasil_vote;
                echo $jml_belum;                    
                ?>
                </td>
                <td><center>
                    <?php
                    if($jml_nominasi == $hasil_vote){
                        echo "<button class='btn btn-sm btn-info'>Vote Selesai</button>";
                    }else{
                        echo "<button class='btn btn-sm btn-danger'>Vote Belum Selesai</button>";
                    }
                    ?>
                </td>
            </tr>

        </table>

        <?php 
        $semua_vote = 13;
        if($hasil_vote >= $semua_vote){ 
            
        ?>

            <?= form_open('index.php/Siswa/vote_status'); ?>
            <form class="m-t-40" novalidate>

            <div class="form-group">
                <label class="control-label mt-3" for="email">Lapor Selesai Vote :</label>
                    <input type="hidden" name="id_siswa" value="<?= $id_siswa ?>">
                    <select name="vote_status" id="" class="form-control" required>
                        <option value="">Pilihan </option>
                        <option value="Selesai">Selesai </option>
                        <!-- <option value="Belum Selesai">Belum Selesai </option> -->
                    </select>
            </div>

            <input type="submit" name="submit" class="btn btn-primary btn-sm mt-2 md-2"></input>
            </center>
            <?=  form_close(); ?>
            </form>

        <?php } ?>



    </div>


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


