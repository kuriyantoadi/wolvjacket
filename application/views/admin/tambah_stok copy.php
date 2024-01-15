<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

     <h4 class="mb-sm-4 font-size-18 ">Tambah Stok</h4>

                <div class="col-xl-7">
                    <div class="card">  
                        <div class="card-body">

                        <h4 class="mb-sm-4 font-size-18 ">Data Barang</h4>

                        <table id="datatable" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Barang</th>
                                    <th><center>Harga Barang</th> 
                                    <th><center>Qty</th> 
                                    <th><center>Pilihan</th>
                                </tr>
                            </thead>
                        
                            </table>
                                                
                        </div>
                    </div>
                </div> <!-- end col -->


                <div class="col-xl-5">
                    <div class="card">  
                        <div class="card-body">

                        <h4 class="mb-sm-4 font-size-18 ">Keranjang Belanja Masuk</h4>

                        <table id="datatable" class="table table-bordered dt-responsive table-hover table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th><center>No</th>
                                    <th><center>Nama Barang</th>
                                    <th><center>Harga Barang</th> 
                                    <th><center>Qty</th>  
                                    <th><center>Pilihan</th>
                                </tr>
                            </thead>
                        
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
                
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



  <script>
        //setting datatables
        // $('#datatable').DataTable({
        //     "paging": false,  // Matikan paginasi
        //     "searching": false,  // Matikan fitur pencarian
        //     "info": false,  // Matikan informasi
        //     "processing": true,
        //     "serverSide": true,
        //     "order": [],
        //     "ajax": {
        //         //panggil method ajax list dengan ajax
        //         "url": "<?= site_url('Ajax/ajax_tambah_stok') ?>",
        //         "type": "POST"
        //     },
        //     "columnDefs": [
        //         {
        //             "targets": [0,3],
        //             "className" : 'text-center'
        //         },
        //          // mematikan sort kolom pilihan
        //         {
        //             // "targets": [5], 
        //             "orderable": false
        //         }
        //     ]
        // });

        // function tambahData() {
        //     var nama = $("#nama").val();
        //     var usia = $("#usia").val();

        //     if (nama.trim() === "" || usia.trim() === "") {
        //         alert("Nama dan usia harus diisi.");
        //         return;
        //     }

        //     $.ajax({
        //         type: "POST",
        //         url: "tambah_data.php",
        //         data: { nama: nama, usia: usia },
        //         success: function (response) {
        //             // Tambahkan data baru ke tabel tanpa perlu memuat ulang
        //             $("#data-table tbody").append(response);
                    
        //             // Reset formulir
        //             $("#nama").val("");
        //             $("#usia").val("");
        //         }
        //     });
        // }
    </script>