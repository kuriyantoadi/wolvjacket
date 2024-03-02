<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Kartu Stok Barang Datang</h4>
                    </div>
                </div>

                <div class="col-12">
                    <p  class="mt-3">Silahkan pilih periode bulan laporan!</p>
                </div>


                <?= form_open('Laporan/kartu_stok_barang_datang_up'); ?>
                <div class="col-5">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <input name="tahun_bulan" class="form-control" type="month" value="" id="example-month-input" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <input type="submit" class="btn btn-primary btn-md" value="Proses Laporan">
                    </div>
                </div>

                <?= form_close() ?>

                <!-- <div class="col-2">
                    
                </div> -->

              

                



                
            </div>

            <!-- <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Silahkan pilih periode bulan laporan!</h4>

                    </div>
                </div>
            </div> -->

            <!-- end page title -->

            
            
        </div>


    </div> <!-- container-fluid -->
    
</div>
    <!-- End Page-content -->


