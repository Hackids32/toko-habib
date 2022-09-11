<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
    </div>

    <div class="col-lg-12 mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Satuan</th>
                                <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'karyawan') : ?>
                                    <th>Harga</th>
                                <?php endif; ?>
                                <th>Harga Jual</th>
                                <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                                    <th>Stok</th>
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
                                    <td><?= $b->nama_jenis ?></td>
                                    <td><?= $b->nama_satuan ?></td>
                                    <?php if ($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'karyawan') : ?>
                                        <td><?= "Rp. " . number_format($b->harga); ?></td>
                                    <?php endif; ?>
                                    <td><?= "Rp. " . number_format($b->harga_jual); ?></td>
                                    <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                                        <td><?= $b->stok ?></td>
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
</div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/barang.js"></script>

<?php if ($this->session->flashdata('Pesan')) : ?>
    <?= $this->session->flashdata('Pesan') ?>
<?php else : ?>
    <script>
        $(document).ready(function() {

        }).then((result) => {

        });
        //});
    </script>
<?php endif; ?>