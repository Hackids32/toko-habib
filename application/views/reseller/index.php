<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Reseller</h1>
    </div>

    <div class="col-lg-12 mb-4" id="container">

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover " id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th width="1%">No</th>
                                <th>Kode Reseller</th>
                                <th>Nama Reseller</th>
                                <th>No.Telepon</th>
                                <th>Alamat</th>
                                <?php if($this->session->userdata('login_session')['level'] == 'admin'): ?>
                                <th width="1%">Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php $no=1; foreach ($reseller as $re) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $re->id_reseller ?></td>
                                <td><?= $re->nama_reseller?></td>
                                <td><?= $re->notelp ?></td>
                                <td><?= $re->alamat ?></td>
                                <?php if($this->session->userdata('login_session')['level'] == 'admin'): ?>
                                <td>
                                    <center>
                                        <a href="#" data-toggle="modal" data-target="#formU"
                                            onclick="ambilData('<?= $re->id_reseller ?>')"
                                            class="btn btn-circle btn-success btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="#" onclick="konfirmasi('<?= $re->id_reseller ?>')"
                                            class="btn btn-circle btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </center>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php if($this->session->userdata('login_session')['level'] == 'admin'): ?>
                    <a href="" data-toggle="modal" data-target="#form" class="btn btn-dark">
                    <span class="text text-white">Tambah Data</span>
                    <span class="icon text-white-50">
                    </span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- form input -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>reseller/proses_tambah" name="myForm" method="POST" onsubmit="return validateForm()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Tambah Re-Seller</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <!-- Nama Supplier -->
                    <div class="form-group"><label>Nama Re-Seller</label>
                        <input class="form-control" name="reseller" type="text" placeholder="">
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-group"><label>Nomor Telepon</label>
                        <input class="form-control" name="notelp" type="number" placeholder="" onkeypress="return angka(event)">
                    </div>

                    <!-- Alamat -->
                    <div class="form-group"><label>Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text text-white">Simpan Data</span>
                    </button>
                    <button type="reset" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text text-white">Reset</span>
                    </button>

                </div>
            </div>
        </div>
    </form>
</div>

<!-- form ubah -->
<div class="modal fade" id="formU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= base_url() ?>reseller/proses_ubah" name="myFormUpdate" method="POST"
        onsubmit="return validateFormUpdate()">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Ubah Supplier</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="col-lg-12">
                    <br>
                    <!-- Id Supplier -->
                    <div class="form-group"><label>ID Re-Seller</label>
                        <input class="form-control" name="idreseller" type="text" id="idreseller" readonly>
                    </div>

                    <!-- Nama Supplier -->
                    <div class="form-group"><label>Nama Re-Seller</label>
                        <input class="form-control" name="reseller" type="text" id="reseller">
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-group"><label>Nomor Telepon</label>
                        <input class="form-control" name="notelp" type="number" id="notelp" onkeypress="return angka(event)">
                    </div>

                    <!-- Alamat -->
                    <div class="form-group"><label>Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text text-white">Simpan Perubahan</span>
                    </button>
                    <button type="reset" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text text-white">Reset</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/reseller.js"></script>
<script src="<?= base_url(); ?>assets/js/angka.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formreseller.js"></script>

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