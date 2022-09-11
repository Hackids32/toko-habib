<!-- Begin Page Content -->
<div class="container-fluid">


    <form action="<?= base_url() ?>barangMasuk/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">

                <h1 class="h2 mb-0 text-gray-800">Tambah Barang Masuk</h1>
            </div>
            
        </div>

        <div>
            <!-- Illustrations -->
            <div class="card border-bottom-dark shadow mb-4">
                <div class="card-header py-3 bg-dark">
                    <h6 class="m-0 font-weight-bold text-white">Form Barang Masuk</h6>
                </div>
                <div class="card-body">
                    <div class="col-lg-20">
                        <!-- Tanggal -->
                        <div class="form-group"><label>Tanggal Masuk</label>
                            <input class="form-control" name="tgl_masuk" type="date" placeholder="">
                        </div>
                        <!-- Pengirim -->
                        <div class="form-group"><label>Pengirim</label>
                            <select name="supplier" class="form-control chosen">
                                <option value=""></option>
                                <?php foreach ($supplier as $sp) : ?>
                                    <option value="<?= $sp->id_supplier ?>"><?= $sp->nama_supplier ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- Nama Barang -->
                        <div class="form-group"><label>Nama Barang</label>
                            <select name="barang" class="form-control chosen" id="barang" onchange="tes();">
                                <option value=""></option>
                                <?php foreach ($barang as $b) : ?>
                                    <option value="<?= $b->id_barang ?>"><?= $b->nama_barang ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- jenis -->

                        <div class="form-group"><label>Jenis Barang</label>
                            <select name="jenis" class="form-control" id="jenis">

                            </select>
                        </div>


                        <!-- Satuan -->
                        <div class="form-group"><label>Satuan Barang</label>
                            <select name="satuan" class="form-control" id="satuan">

                            </select>
                        </div>

                        <!-- Harga -->
                        <div class="form-group"><label>Harga Satuan</label>
                            <input class="form-control" name="harga_msk" type="number" placeholder="" onkeypress="return angka(event)">
                        </div>


                        <!-- Stok -->
                        <div class="form-group"><label>Jumlah</label>
                            <input class="form-control" name="jumlah_masuk" type="number" placeholder="" onkeypress="return angka(event)">
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

            <a href="<?= base_url() ?>barang_masuk" class="btn btn-md btn-primary">Kembali</a>

        </div>

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
<script src="<?= base_url(); ?>assets/js/barangmasuk.js"></script>
<script src="<?= base_url(); ?>assets/js/loading.js"></script>
<script src="<?= base_url(); ?>assets/js/angka.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formbarangmasuk.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
    $('.chosen').chosen({
        width: '100%',

    });
</script>

<?php if ($this->session->flashdata('Pesan')) : ?>
    <?= $this->session->flashdata('Pesan') ?>
<?php else : ?>
    <script>
        async function tes() {
            let barang = document.getElementById('barang').value;
            let getDetail = await fetch(`/toko_habib/barangMasuk/getDetail/${barang}`)
                .then(r => r.text())
                .then(d => {
                    return d;
                })

            // console.log(getDetail);
            let data = getDetail.split(" , ");
            let satuan = data[0].split(":");
            let jenis = data[1].split(":");

            console.log(satuan, jenis);

            document.getElementById('jenis').innerHTML = '';
            document.getElementById('jenis').innerHTML += `<option value="${jenis[0]}">${jenis[1]}</option>`;

            document.getElementById('satuan').innerHTML = '';
            document.getElementById('satuan').innerHTML += `<option value="${satuan[0]}">${satuan[1]}</option>`;
        }
    </script>
<?php endif; ?>