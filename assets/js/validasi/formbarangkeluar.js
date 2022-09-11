function validateForm() {
    var tgl_keluar = document.forms["myForm"]["tgl_keluar"].value;
    var nama_reseller = document.forms["myForm"]["reseller"].value;
    var nama_barang = document.forms["myForm"]["barang"].value;
    var nama_jenis = document.forms["myForm"]["jenis"].value;
    var nama_satuan = document.forms["myForm"]["satuan"].value;
    var harga_kel = document.forms["myForm"]["harga_kel"].value;
    var jumlah_keluar = document.forms["myForm"]["jumlah_keluar"].value;
    if (tgl_keluar == '') {
        validasi('Tanggal Keluar wajib di isi!', 'warning');
        return false;
    } else if (nama_reseller == '') {
        validasi('Penerima wajib di isi!', 'warning');
        return false;
    } else if (nama_barang == '') {
        validasi('Barang wajib di isi!', 'warning');
        return false;
    } else if (nama_jenis == '') {
        validasi('Jenis wajib di isi!', 'warning');
        return false;
    } else if (nama_satuan == '') {
        validasi('Satuan wajib di isi!', 'warning');
        return false;
    } else if (harga_kel == '') {
        validasi('Harga wajib di isi!', 'warning');
        return false;
    } else if (jumlah_keluar == '') {
        validasi('Jumlah Keluar wajib di isi!', 'warning');
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