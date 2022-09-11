<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    </div>

    <div class="col-lg-12 mb-4">

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th width="1%">No</th>
                                <th>Foto</th>
                                <th>Nama User</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Level</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;" id="tbody">
                            <?php $no = 1;
                            foreach ($user as $u) : ?>
                                <tr>
                                    <td onclick="detail('<?= $u->id_user ?>')"><?= $no++ ?>.</td>
                                    <td onclick="detail('<?= $u->id_user ?>')"><img style="border-radius: 5px;" src="assets/upload/pengguna/<?= $u->foto ?>" alt="" width="50px"></td>
                                    <td onclick="detail('<?= $u->id_user ?>')"><?= $u->nama ?></td>
                                    <td onclick="detail('<?= $u->id_user ?>')"><?= $u->alamat ?></td>
                                    <td onclick="detail('<?= $u->id_user ?>')"><?= $u->notelp ?></td>
                                    <td onclick="detail('<?= $u->id_user ?>')"><?= $u->level ?></td>
                                    <td>
                                        <center>
                                            <a href="<?= base_url() ?>user/ubah/<?= $u->id_user ?>" class="btn btn-circle btn-success btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="#" onclick="konfirmasi('<?= $u->id_user ?>')" class="btn btn-circle btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?= base_url() ?>user/tambah" class="btn btn-dark">
                        <span class="text text-white">Tambah User</span>
                        <span class="icon text-white-50"></span></a>
                </div>
            </div>
        </div>

    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>
<?php if ($this->session->flashdata('Pesan')) : ?>
    <?= $this->session->flashdata('Pesan') ?>
<?php else : ?>
    <script>
        $(document).ready(function() {

        }).then((result) => {

        });
    </script>
<?php endif; ?>