<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 1 = tanggal
	// variabel pecahkan 0 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang Keluar</h1>


    </div>

    <div class="col-lg-12 mb-4" id="container">

       <!-- Illustrations -->

        <!-- Illustrations -->
        <div class="card border-bottom-secondary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dtHorizontalExample" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th width="1%">No</th>
                                <th>ID Transaksi</th>
                                <th>Tanggal Keluar</th>
                                <th>Penerima</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Satuan</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="cursor:pointer;" id="tbody"> 
                            <?php $no=1; foreach ($bkeluar as $bk): ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $bk->id_barang_keluar ?></td>
                                <td><?= $bk->tgl_keluar ?></td>
                                <td><?= $bk->nama_reseller ?></td>
                                <td><?= $bk->nama_barang ?></td>
                                <td><?= $bk->nama_jenis ?></td>
                                <td><?= $bk->nama_satuan ?></td>
                                <td><?= "Rp." . number_format($bk->harga_kel); ?></td>
                                <td><?= $bk->jumlah_keluar ?></td>
                                <td><?= "Rp." . number_format($bk->harga_kel * $bk->jumlah_keluar); ?></td>
                                <td>
                                        <a href="#" onclick="konfirmasi('<?= $bk->id_barang_keluar ?>')"
                                            class="btn btn-circle btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                   
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

            <a href="<?= base_url() ?>barangKeluar/tambah" class="btn  btn-dark">
            <span class="text text-white">Tambah Barang</span>
            <span class="icon text-white-50">
            </span>
        </a>
                    
                            </div>
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
<script src="<?= base_url(); ?>assets/js/barangKeluar.js"></script>

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