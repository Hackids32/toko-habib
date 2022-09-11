<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>

        <?php if ($datapesanbarang != 0) { ?>
            <div class="alert alert-primary" role="alert">
                <b>Ada Pesanan Dari Reseller!
            </div>
        <?php } else {
        } ?>
    <?php endif; ?>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" id="barang">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Barang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlbarang ?> Barang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" id="supplier">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Supplier
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlsupplier ?> Data</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" id="stok">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Reseller
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlres ?> Data</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" id="user">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlUser ?> Data</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-7 col-lg-7">
            <div class="card border-bottom-secondary shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Data Barang Re-Order</h4>
                        <table class="table table-bordered table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                    <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'karyawan') : ?>
                                        <th>Harga</th>
                                    <?php endif; ?>
                                    <th>Harga Jual</th>
                                    <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                                        <th width="1%">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody style="cursor:pointer;" id="tbody">
                                <?php $no = 1;
                                foreach ($barang as $b) : ?>
                                    <tr>
                                        <td><?= $no++ ?>.</td>
                                        <td><?= $b->nama_barang ?></td>
                                        <td><?= $b->nama_satuan ?></td>
                                        <td><?= $b->stok ?></td>
                                        <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'karyawan') : ?>
                                            <td><?= "Rp. " . number_format($b->harga); ?></td>
                                        <?php endif; ?>
                                        <td><?= "Rp. " . number_format($b->harga_jual); ?></td>
                                        <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                                            <td>

                                                <a href="<?= base_url() ?>barang/ubah/<?= $b->id_barang ?>" class="btn btn-circle btn-success btn-sm">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="#" onclick="konfirmasi('<?= $b->id_barang ?>')" class="btn btn-circle btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                            <a href="<?= base_url() ?>barang/tambah" class="btn  btn-dark">
                                <span class="text text-white">Tambah Barang</span>
                                <span class="icon text-white-50">
                                </span>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-5 col-lg-5">
            <div class="card border-bottom-secondary shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4>Data Barang Terlaris</h4>
                        <table class="table table-bordered table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Barang</th>
                                    <th>Terjual</th>
                                </tr>
                            </thead>
                            <tbody style="cursor:pointer;" id="tbody">
                                <?php $no = 1;
                                foreach ($baranglaris as $b) : ?>
                                    <tr>
                                        <td><?= $no++ ?>.</td>
                                        <td><?= $b->nama_barang ?></td>
                                        <td><?= $b->total_terjual ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                            <a href="<?= base_url() ?>barang/tambah" class="btn  btn-dark">
                                <span class="text text-white">Tambah Barang</span>
                                <span class="icon text-white-50">
                                </span>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>


    </div>

    <div class="row">


    </div>
</div>
</div>


</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/chart/chart-bar.js"></script>

<script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dashboard.js"></script>