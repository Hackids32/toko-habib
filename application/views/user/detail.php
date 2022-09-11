<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            <h1 class="h2 mb-0 text-gray-800">Detail Pengguna</h1>
        </div>

        <a href="<?= base_url() ?>user" class="btn btn-primary">Kembali
            </a>
        <!-- 
            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>
            -->
    </div>

    <?php foreach ($data as $d): ?>

    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-12 mb-4">
            <!-- buku -->
            <div class="card shadow mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3">
                        <img width="100%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/pengguna/<?= $d->foto ?>" alt="">
                    </div>

                    <br>

                    <div class="col-lg-9">
                        <!-- ID Anggota -->
                        <div class="form-group"><label>ID Pengguna</label>
                            <h4 class="h4 text-gray-800"><b><?= $d->id_user ?></b></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                         <!-- Nama Lengkap -->
                         <div class="form-group"><label>Nama Lengkap</label>
                            <h4 class="h4 text-gray-800"><?= $d->nama ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Username -->
                        <div class="form-group"><label>Username</label>
                            <h4 class="h4 text-gray-800"><?= $d->username ?></h4>
                        </div>
                        
                        <!-- Divider -->
                        <hr class="sidebar-divider">
                        
                        <!-- Password -->
                        <div class="form-group"><label>Password</label>
                            <h4 class="h4 text-gray-800"><?= $d->password ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- NoTelepon -->
                        <div class="form-group"><label>Nomor Telepon</label>
                            <h4 class="h4 text-gray-800"><?= $d->notelp ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Alamat -->
                        <div class="form-group"><label>Alamat</label>
                            <h4 class="h4 text-gray-800"><?= $d->alamat ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Level -->
                        <div class="form-group"><label>Level</label>
                            <h4 class="h4 text-gray-800"><?= $d->level ?></h4>
                        </div>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                    </div>

                </div>
            </div>

        </div>

        <?php endforeach; ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {
    }).then((result) => {

    })
});
</script>
<?php endif; ?>