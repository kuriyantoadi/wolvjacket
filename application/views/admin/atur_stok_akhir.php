<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                

                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        PROSES PENGATURAN STOK HANYA DILAKUKAN PADA AKHIR PERIODE PENJUALAN SETIAP BULAN !
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Atur Stok Akhir</h4>
                    </div>
                </div>


                <?= form_open('Laporan/kartu_stok_barang_datang_up'); ?>
                <div class="col-6">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <input name="bulan_tahun" class="form-control m-1" type="month" value="" id="example-month-input" required>
                        <input type="submit" class="btn btn-primary btn-sm m-1" value="Atur Stok Akhir Bulan Ini">
                    </div>
                </div>

                <?= form_close() ?>

            </div>


            
            
        </div><!-- container-fluid -->

    </div> <!-- End Page-content  -->
    
</div><!-- Main content -->

    

