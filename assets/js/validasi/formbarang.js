function validateForm() {
    var barang = document.forms["myForm"]["barang"].value;
    var jenis = document.forms["myForm"]["jenis"].value;
    var satuan = document.forms["myForm"]["satuan"].value;
    var harga = document.forms["myForm"]["harga"].value;
    var stok = document.forms["myForm"]["stok"].value;

    if (barang == "") {
        validasi('Nama Barang wajib di isi!', 'warning');
        return false;
    } else if (jenis == '') {
        validasi('Jenis Barang wajib di isi!', 'warning');
        return false;
    } else if (satuan == '') {
        validasi('Satuan Barang wajib di isi!', 'warning');
        return false;
    } else if (harga == '') {
        validasi('Harga wajib di isi!', 'warning');
        return false;
    } else if (stok == '') {
        validasi('Stok wajib di isi!', 'warning');
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