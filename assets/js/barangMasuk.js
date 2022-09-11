$(document).ready(function() {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');


});

function ambilBarang() {
    var link = $('#baseurl').val();
    var base_url = link + 'barangMasuk/getBarang';
    var barang = $('[name="barang"]').val();

    if (barang == '') {
        $('#preview').attr("src", link + "assets/upload/barang/box.png");
        $('#judul').text("-");
        $('#stok').text("-");
    } else {
        $.ajax({
            type: 'POST',
            data: 'id=' + barang,
            url: base_url,
            dataType: 'json',
            success: function(hasil) {
                $('#preview').attr("src", link + "assets/upload/barang/" + hasil[0].foto);
                $('#judul').text(hasil[0].nama_barang);
                $('#stok').text(hasil[0].stok);
            }
        });
    }


}


function detail(id) {
    var base_url = $('#baseurl').val();
    window.location.href = base_url + "barangMasuk/detail_data/" + id;

}

function konfirmasi(id, jml, idb) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
                    window.location.href = base_url + "barangMasuk/proses_hapus/" + id + '/' + jml + '/' + idb;
                }
            
    });

}