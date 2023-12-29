<!DOCTYPE html>
<html lang="en">

    <head>
        <title><?= $title ?> 2023</title>
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

        
        <!-- DataTables -->
        <link href="<?= base_url() ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?= base_url() ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        
    </head>

    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- awal header -->
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url() ?>assets/images/logo-sm.svg" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url() ?>assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt"><?= $title ?></span>
                                </span>
                            </a>

                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url() ?>assets/images/logo-sm.svg" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url() ?>assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt"><?= $title ?></span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">
  

                    

                        <!-- user awal -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium">Administrator</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <!-- <a class="dropdown-item" href="apps-contacts-profile.php"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profil</a> -->
                                <a class="dropdown-item" href="<?= site_url('index.php/Admin/password') ?>"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i>Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= site_url('index.php/Login/admin_logout') ?>"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                            </div>
                        </div>
                        <!-- user akhir -->
                    </div>
                </div>
            </header>
            <!-- akhir header -->


            <!-- ========== Left Sidebar Start ========== -->
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" data-key="t-menu"><?= $title ?></li>
                            <li>
                                <a href="<?= base_url() ?>index.php/Admin">
                                    <i class="dripicons-home"></i>
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                            
                            <!-- <li>
                                <a href="">
                                    <i class="dripicons-user"></i>
                                    <span data-key="">Data Barang</span>
                                </a>
                            </li> -->

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i class="bx bx-box"></i>
                                    <span data-key="t-multi-level">Barang</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="#" data-key="t-level-1-1">Data Barang</a></li>
                                </ul>
                                 <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="#" data-key="t-level-1-1">Kategori</a></li>
                                </ul>
                                 <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="#" data-key="t-level-1-1">Atur Stok Akhir</a></li>
                                </ul>
                                 <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="#" data-key="t-level-1-1">Tambah Stok</a></li>
                                </ul>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="#" data-key="t-level-1-1">Daftar Tambah Stok</a></li>
                                </ul>
                            </li>
                            

                        </ul>
                        <!-- Left Menu End -->



                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->