<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?= base_url() ?>Admin" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/images/logo-wolv-nobg.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/images/logo-wolv-nobg.png" alt="" height="24"> 
                    </span>
                </a>

                <a href="<?= base_url() ?>Admin" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/images/logo-wolv-nobg.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/images/logo-wolv-nobg.png" alt="" height="24"> 
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?= $ses_nama_pengguna ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                 <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="<?= site_url('index.php/Admin/profil') ?>"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profil</a>
                    <a class="dropdown-item" href="<?= site_url('index.php/Admin/password') ?>"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i>Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= site_url('index.php/Login/admin_logout') ?>"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="index.php" id="topnav-dashboard" role="button">
                            <i data-feather="home"></i><span data-key="t-dashboards">Dashboard</span>
                        </a>
                    </li> -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid"></i><span data-key="t-apps">Transaksi</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <a href="apps-calendar.php" class="dropdown-item" data-key="t-calendar">Transaksi</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Daftar Transaksi Bulanan</a>

                            
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid"></i><span data-key="t-apps">Retur</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <a href="apps-calendar.php" class="dropdown-item" data-key="t-calendar">Retur</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Daftar Retur</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid" class="dripicons-retweet"></i><span data-key="t-apps">Refund</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <a href="apps-calendar.php" class="dropdown-item" data-key="t-calendar">Refund</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Daftar Refund</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid"></i><span data-key="t-apps">Barang</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <a href="apps-calendar.php" class="dropdown-item" data-key="t-calendar">Data Barang</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Kategori Barang</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Brand</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Atur Stok Akhir</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Tambah Stok</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Daftar Tambah Stok</a>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid"></i><span data-key="t-apps">Retur</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <a href="apps-calendar.php" class="dropdown-item" data-key="t-calendar">Retur</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Daftar Retur</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid"></i><span data-key="t-apps">Retur</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <a href="apps-calendar.php" class="dropdown-item" data-key="t-calendar">Retur</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Daftar Retur</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid"></i><span data-key="t-apps">Retur</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <a href="apps-calendar.php" class="dropdown-item" data-key="t-calendar">Retur</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Daftar Retur</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid"></i><span data-key="t-apps">Retur</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <a href="apps-calendar.php" class="dropdown-item" data-key="t-calendar">Retur</a>
                            <a href="apps-chat.php" class="dropdown-item" data-key="t-chat">Daftar Retur</a>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>