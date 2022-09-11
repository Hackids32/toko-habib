function validateForm() {
    var tgl_masuk = document.forms["myForm"]["tgl_masuk"].value;
    var nama_supplier = document.forms["myForm"]["supplier"].value;
    var nama_barang = document.forms["myForm"]["barang"].value;
    var nama_jenis = document.forms["myForm"]["jenis"].value;
    var nama_satuan = document.forms["myForm"]["satuan"].value;
    var harga_msk = document.forms["myForm"]["harga_msk"].value;
    var jumlah_masuk = document.forms["myForm"]["jumlah_masuk"].value;
    if (tgl_masuk == '') {
        validasi('Tanggal Masuk wajib di isi!', 'warning');
        return false;
    } else if (nama_supplier == '') {
        validasi('Supplier wajib di isi!', 'warning');
        return false;
    } else if (nama_barang == '') {
        validasi('Nama Barang wajib di isi!', 'warning');
        return false;
    } else if (nama_jenis == '') {
        validasi('Jenis wajib di isi!', 'warning');
        return false;
    } else if (nama_satuan == '') {
        validasi('Satuan wajib di isi!', 'warning');
        return false;
    } else if (harga_msk == '') {
        validasi('Harga wajib di isi!', 'warning');
        return false;
    } else if (jumlah_masuk == '') {
        validasi('Jumlah Masuk wajib di isi!', 'warning');
        return false;
    }

}

function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}