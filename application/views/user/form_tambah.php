<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>user/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Tambah Pengguna</h1>
            </div>
            <div>
            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>
            <a href="<?= base_url() ?>user" class="btn btn-primary"> Kembali </a>
        </div>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- form -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Pengguna</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <!-- Nama Lengkap -->
                            <div class="form-group"><label>Nama Lengkap</label>
                                <input class="form-control" name="namaL" type="text" placeholder="">
                            </div>
                            <!-- Username -->
                            <div class="form-group"><label>Username</label>
                                <input class="form-control" name="user" type="text" placeholder="">
                            </div>

                            <!-- NO Telepon -->
                            <div class="form-group"><label>Nomor Telepon</label>
                                <input class="form-control" name="notelp" type="number" onkeypress="return angka(event)">
                            </div>

                            <!-- Email -->
                            <div class="form-group"><label>Alamat</label>
                                <input class="form-control" name="alamat" type="text" >
                            </div>

                            <!-- Level -->
                            <div class="form-group"><label>Level</label>
                                <select name="level" class="form-control">
                                    <option value=""></option>
                                    <option value="admin">Admin Gudang</option>
                                    <option value="owner">Owner</option>
                                    <option value="karyawan">Karyawan Toko</option>
                                    <option value="reseller">Re-Seller</option>
                                </select>
                            </div>

                            <!-- Password -->
                            <div class="form-group"><label>Password</label>
                                <input class="form-control" name="pwd" type="password" >
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="form-group"><label>Konfirmasi Password</label>
                                <input class="form-control" name="kpwd" type="password" >
                            </div>

                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- file -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                    </div>
                    <div class="card-body">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                Format
                                <div class="text-white-45 small">.png .jpeg .jpg</div>
                            </div>
                        </div>
                        <div>
                        <br>
                        <center>
                            <div>
                                <img src="<?= base_url() ?>assets/upload/pengguna/user.png" id="outputImg" width="200"
                                    maxheight="300">
                            </div>
                        </center>
                        <br>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" id="GetFile" name="photo"
                                    onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>
<script src="<?= base_url(); ?>assets/js/angka.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formuser.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>
    <?= $this->session->flashdata('Pesan') ?>
<?php else: ?>
<script>
$(document).ready(function() {

    }).then((result) => {

    })
});
</script> 
<?php endif; ?>