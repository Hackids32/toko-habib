<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pesan Barang</h1>
    </div>

    <div class="col-lg-12 mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <?php if ($this->session->userdata('login_session')['level'] == 'reseller') : ?>
                                    <th>Satuan</th>
                                <?php endif; ?>
                                <th>Harga Satuan</th>
                                <th>Jumlah Pesanan</th>
                                <th>Total</th>
                                <?php if ($this->session->userdata('login_session')['level'] == 'reseller') : ?>
                                    <th>Keterangan</th>
                                <?php endif; ?>
                                <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ?>
                                    <th>Pemesan</th>
                                    <th>Status</th>
                                    <th width="1%">Aksi</th>
                                <?php endif; ?>
                            </tr>

                        </thead>
                        <tbody style="cursor:pointer;" id="tbody">
                            <?php $no = 1;
                            foreach ($pesanbarang as $b) : ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $b->nama_barang ?></td>
                                    <td><?= $b->nama_jenis ?></td>
                                    <?php if ($this->session->userdata('login_session')['level'] == 'reseller') : ?>
                                        <td><?= $b->nama_satuan ?></td>
                                    <?php endif; ?>
                                    <td><?= "Rp " . number_format($b->harga, 2, ',', '.'); ?></td>
                                    <td><?= $b->jumlah ?></td>
                                    <td><?= "Rp " . number_format($b->harga * $b->jumlah, 2, ',', '.'); ?></td>

                                    <!--role reseller-->
                                    <?php if ($this->session->userdata('login_session')['level'] == 'reseller') : ?>
                                        <td><?php echo $b->verifikasi; ?></td>
                                    <?php endif; ?>

                                    <!--role admin-->
                                    <?php if ($this->session->userdata('login_session')['level'] == 'admin') : ($b->verifikasi == "") ?>
                                        <td><?= $b->reseller ?></td>
                                        <td><?= $b->verifikasi ?></td>
                                        <td>
                                            <a href="#" onclick="konfirmasitrm('<?= $b->id ?>')" class="btn btn-circle btn-success btn-sm">
                                                <i class="fas fa-check"></i>
                                            </a>

                                            <a href="#" onclick="konfirmasikrm('<?= $b->id ?>')" class="btn btn-circle btn-primary btn-sm">
                                                <i class="fas fa-truck"></i>
                                            </a>

                                            <a href="#" onclick="konfirmasitlk('<?= $b->id ?>')" class="btn btn-circle btn-danger btn-sm">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

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
<script src="<?= base_url(); ?>assets/js/pesanan.js"></script>

<?php if ($this->session->flashdata('Pesan')) : ?>
    <?= $this->session->flashdata('Pesan') ?>
<?php else : ?>
    <script>
        $(document).ready(function() {

        }).then((result) => {

        });
    </script>
<?php endif; ?>