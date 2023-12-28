<!DOCTYPE html>
<html lang="en">

    <head>

        <title><?=$title ?></title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
        <meta content="Themesbrand" name="author"/>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

        <!-- preloader css -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xxl-3 col-lg-4 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 text-center">
                                        <a href="index.php" class="d-block auth-logo">
                                            <img src="<?= base_url() ?>assets/images/logo-teacher.jpeg" alt="" height="200"> 
                                            <br><span class="logo-txt">SMK Negeri 1 Kragilan</span>
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Halaman Login Siswa</h5>
                                            <p class="text-muted mt-2">Teacher Awards 2023</p>
                                        </div>
                                        
                                        <!-- <form class="custom-form mt-4 pt-2" action="" method=""> -->
           				    		    <br><?= $this->session->flashdata('msg') ?>

                                        <?= form_open('index.php/Login/login_siswa') ?>
                                        <form class="m-t-40" novalidate>
                                            <div class="mb-3">
                                                <label class="form-label" for="nisn">NISN</label>
                                                <input type="text" class="form-control" id="nisn" placeholder="Masukan NISN" name="nisn_siswa" value="" required>
                                                <span class="text-danger"></span>
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label" for="password" required>Sandi</label>
                                                    </div>
                                                </div>

                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" placeholder="Masukan password" name="password" value="" aria-label="Password" aria-describedby="password-addon" required>
                                                    <span class="text-danger"></span>
                                                    <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        <?= form_close() ?>
                                        </form>

                                        <!-- </form> -->

                                        <!-- <div class="mt-3 text-center">
                                            <p class="text-muted mb-0">Saya belum mendaftar ? <a href="<?= base_url() ?>Daftar" class="text-primary fw-semibold"> Segera Daftar </a> </p>
                                        </div> -->
                                    </div>
                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>
                                                document.write(new Date().getFullYear())
                                            </script> SMKN 1 Kragilan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class="auth-bg pt-md-5 p-4 d-flex">
                            <div class="bg-overlay bg-info"></div>

                            <!-- end bubble effect -->
                            <div class="row justify-content-center align-items-center d-none">
                                <div class="col-xl-7">
                                    <div class="p-0 p-sm-4 px-xl-0">
                                        <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <!-- end carouselIndicators -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="testi-contain text-white">
                                                        <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                        <h4 class="mt-4 fw-medium lh-base text-white">“I feel confident
                                                            imposing change
                                                            on myself. It's a lot more progressing fun than looking back.
                                                            That's why
                                                            I ultricies enim
                                                            at malesuada nibh diam on tortor neaded to throw curve balls.”
                                                        </h4>
                                                        <div class="mt-4 pt-3 pb-5">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-shrink-0">
                                                                    <img src="assets/images/users/avatar-1.jpg" class="avatar-md img-fluid rounded-circle" alt="...">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3 mb-4">
                                                                    <h5 class="font-size-18 text-white">Richard Drews
                                                                    </h5>
                                                                    <p class="mb-0 text-white-50">Web Designer</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end carousel-inner -->
                                        </div>
                                        <!-- end review carousel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>


        <!-- JAVASCRIPT -->
        <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="<?= base_url() ?>assets/libs/pace-js/pace.min.js"></script>
        <!-- password addon init -->
        <script src="<?= base_url() ?>assets/js/pages/pass-addon.init.js"></script>

    </body>

</html>