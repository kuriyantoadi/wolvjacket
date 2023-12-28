
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
                            <h4 class="card-title">Pilih Guru Terbaik</h4>
                        </div>

                        <div class="card-body">

                            <?php  
                            if(!empty($cek_vote)){ ?>
                                <p>Mohon maaf anda udah vote dihalaman ini</p>
                                <a href="<?= base_url() ?>/Siswa/nominasi" class="btn btn-secondary btn-sm">Kembali</a>
                            <?php }else{ ?>

                        <div class="m-b-40">
                            <?php foreach ($tampil as $row) { ?>
                            <p>
                                <img src="../../assets/photo_upload/<?= $row->photo_guru ?>" alt="Tidak Ada photo" width="200px">
                                <br>
                                <!-- <input class="form-check-input" type="radio" name="id_guru" id="formRadios1" value="<?= $row->id_guru ?>" checked> -->
                                <!-- <input type="hidden" name="id_mapel" value="<?= $row->id_mapel ?>"> -->
                                Bapak/Ibu <b> <?=$row->nama_guru ?> </b>

                            </p>
                        </div>   
                        
                        
                        <div class="row">
                            <div class="col-12">

                                <?= form_open('index.php/Siswa/vote_up');  ?>
                                  <form class="m-t-40" novalidate>    

                                    <div class="form-group">
                                        <label class="control-label mt-3" for="email">Pilih Guru Terbaik <?= $row->nama_mapel ?>:</label>
                            
                                            <input type="hidden" name="id_guru" value="<?= $row->id_guru ?>" >
                                            <input type="hidden" name="id_mapel" value="<?= $row->id_mapel ?>" >
                                        <?php } ?>
                        
                                        <select name="id_guru" id="" class="form-control" required>
                                            <option value="">Pilihan </option>
                                            
                                            <?php foreach ($tampil as $row) { ?>
                                            <option value="<?= $row->id_guru ?>"><?= $row->nama_guru ?></option>
                                            
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <button type="submit" name="upload" value="upload" class="btn btn-primary mb-5">Submit</button>
                                    <?= form_close();   ?>

                                  </form>
                          <?php } ?>
                        </div> <!-- container -->
                        
                    </div>
                </div> <!-- end col -->


