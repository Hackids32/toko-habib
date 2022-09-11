<?php

if (!$this->session->has_userdata('login_session')) {
    redirect('login');
}
//cek new orders
$kueri = $this->db->query("SELECT * FROM pesanbarang WHERE verifikasi = ''");
$jml = $kueri->num_rows();
$psn = "Hore ! Ada pesanan baru. Segera cek";

//cek stok under 10qty
$kueri2 = $this->db->query("SELECT * FROM barang WHERE stok <= '10'");
$jml2 = $kueri2->num_rows();
$psn2 = "Awas ! Ada stok yang kurang dari 10 qty. Segera re-stock";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/icon/hitam1.png">

    <title>Toko Habib | <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/sbadmin/css/sb-admin-biru.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/profileee.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/all.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/animate/animate.min.css" rel="stylesheet">
    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- Select Chosen -->
    <link href="<?= base_url(); ?>assets/plugin/chosen/dist/css/component-chosen.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-bata sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <hr class="sidebar-divider my-0">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>home">
                <div class="sidebar-brand-icon ">
                    <img src="<?= base_url(); ?>assets/icon/putih1.png" width="40">
                </div>
                <div class="sidebar-brand-text mx-3 ">Toko Habib</div>
            </a>
            <!-- garis-->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <?php if ($title == 'Dashboard') : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url(); ?>home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
                <hr class="sidebar-divider my-0">
                <!-- MENU USER -->

                <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>

                    <?php if ($title == 'User') : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url() ?>user">
                            <i class="fas fa-fw fa-child"></i>
                            <span>Data User</span>
                        </a>
                        </li>
                    <?php endif; ?>
                    <hr class="sidebar-divider my-0">
                    <!-- MENU MASTER DATA -->

                    <!-- Nav Item - Pages Collapse Menu -->
                    <?php if (
                        $title == 'Barang' or $title == 'Satuan Barang' or $title == 'Jenis Barang'
                        or $title == 'Supplier' or $title == 'Re-Seller'
                    ) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                            <i class="fas fa-fw fa-cubes"></i>
                            <span>Master Data</span>
                        </a>
                        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Master Barang</h6>
                                <a class="collapse-item" href="<?= base_url() ?>barang">Data Barang</a>
                                <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                                    <a class="collapse-item" href="<?= base_url() ?>jenis">Jenis Barang</a>
                                    <a class="collapse-item" href="<?= base_url() ?>satuan">Satuan Barang</a>
                                <?php endif; ?>
                                <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'karyawan') : ?>
                                    <a class="collapse-item" href="<?= base_url() ?>supplier">Data Supplier</a>
                                    <a class="collapse-item" href="<?= base_url() ?>reseller">Data Reseller</a>
                                <?php endif; ?>
                            </div>

                        </div>
                        </li>

                        <hr class="sidebar-divider my-0">
                        <!-- MENU TRANSAKSI -->
                        <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'owner') : ?>

                            <?php if ($title == 'Barang Masuk' or $title == 'Barang Keluar') : ?>
                                <li class="nav-item active">
                                <?php else : ?>
                                <li class="nav-item">
                                <?php endif; ?>
                                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
                                    <i class="fas fa-fw fa-truck"></i>
                                    <span>Transaksi</span>
                                </a>
                                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <h6 class="collapse-header">Data Transaksi</h6>
                                        <a class="collapse-item" href="<?= base_url() ?>barang_masuk">Barang Masuk</a>
                                        <a class="collapse-item" href="<?= base_url() ?>barang_keluar">Barang Keluar</a>
                                    </div>

                                </div>
                                </li>

                            <?php endif; ?>
                            <hr class="sidebar-divider my-0">
                            <!-- MENU LAPORAN-->

                            <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'owner') : ?>

                                <?php if ($title == 'Laporan Barang Masuk' or $title == 'Laporan Barang Keluar') : ?>
                                    <li class="nav-item active">
                                    <?php else : ?>
                                    <li class="nav-item">
                                    <?php endif; ?>
                                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
                                        <i class="fas fa-fw fa-print"></i>
                                        <span>Laporan</span>
                                    </a>
                                    <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                                        <div class="bg-white py-2 collapse-inner rounded">
                                            <h6 class="collapse-header">Laporan</h6>
                                            <a class="collapse-item" href="<?= base_url() ?>lap_barang">Stok Barang</a>
                                            <a class="collapse-item" href="<?= base_url() ?>lap_barang_masuk">Barang Masuk</a>
                                            <a class="collapse-item" href="<?= base_url() ?>lap_barang_keluar">Barang Keluar</a>
                                        </div>

                                    </div>
                                    </li>

                                <?php endif; ?>
                                <hr class="sidebar-divider my-0">
                                <!-- MENU PESANAN ADMIN -->

                                <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>

                                    <?php if ($title == 'Pesanan') : ?>
                                        <li class="nav-item active">
                                        <?php else : ?>
                                        <li class="nav-item">
                                        <?php endif; ?>
                                        <a class="nav-link" href="<?= base_url() ?>pesanbarang/index">
                                            <i class="fa fa-cart-arrow-down"></i>
                                            <span>Pesanan</span>
                                        </a>
                                        </li>

                                    <?php endif; ?>

                                    <!-- MENU PESANAN RESELLER -->

                                    <?php if ($this->session->userdata('login_session')['level'] == 'reseller') : ?>

                                        <?php if ($title == 'Pesan Barang') : ?>
                                            <li class="nav-item active">
                                            <?php else : ?>
                                            <li class="nav-item">
                                            <?php endif; ?>
                                            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
                                                <i class="fas fa-fw fa-cubes"></i>
                                                <span>Master Pesan</span>
                                            </a>
                                            <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                                                <div class="bg-white py-2 collapse-inner rounded">
                                                    <h6 class="collapse-header">Master Pesan Barang</h6>
                                                    <a class="collapse-item" href="<?= base_url() ?>pesanBarang/index">Pesan Barang
                                                    </a>
                                                    <a class="collapse-item" href="<?= base_url() ?>pesanBarang/Tambah">Tambah Pesan Barang
                                                    </a>
                                                </div>
                                            </div>
                                            </li>
                                        <?php endif; ?>
                                        <hr class="sidebar-divider my-0">
                                        <!-- TENTANG TOKO -->

                                        <?php if ($title == 'About') : ?>
                                            <li class="nav-item active">
                                            <?php else : ?>
                                            <li class="nav-item">
                                            <?php endif; ?>
                                            <a class="nav-link" href="<?= base_url() ?>">
                                                <i class="fas fa-fw fa-home"></i>
                                                <span>Tentang Toko</span>
                                            </a>
                                            </li>
                                            <hr class="sidebar-divider my-0">

                                            <p>

                                                <!-- Sidebar Toggler (Sidebar) -->
                                            <div class="text-center d-none d-md-inline">
                                                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php echo $jml2; ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Pemberitahuan Stok Barang
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>barang">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-bell text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo date('Y-m-d'); ?></div>
                                        <span class="font-weight-bold"><?php echo $psn2; ?></span>
                                    </div>
                                </a>

                                <a class="dropdown-item text-center small text-gray-500" href="<?php echo base_url(); ?>barang">Show All Alerts !</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-paper-plane fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php echo $jml; ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Pemberitahuan Pesanan Baru
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url(); ?>pesanbarang/index">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-paper-plane text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo date('Y-m-d'); ?></div>
                                        <span class="font-weight-bold"><?php echo $psn; ?></span>
                                    </div>
                                </a>

                                <a class="dropdown-item text-center small text-gray-500" href="<?php echo base_url(); ?>pesanbarang/index">Show All Alerts !</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="namaP"><?= $this->session->userdata('login_session')['username'] ?></span>
                                <input type="hidden" name="iduser" id="iduser" value="<?= $this->session->userdata('login_session')['id_user'] ?>">
                                <img class="img-profile rounded-circle" id="img" src="<?= base_url() ?>assets/upload/pengguna/<?= $this->session->userdata('login_session')['foto'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item logout" href="#" id="logout" onclick="logout()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- base url untuk js -->
                <input type="hidden" value="<?= base_url() ?>" id="baseurl">