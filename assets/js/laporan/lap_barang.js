$(document).ready(function() {
    ambilB();
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}

function refresh() {
    var t = $('#dtHorizontalExample').DataTable();
    t.ajax.reload();
}


function ambilB() {
    var link = $('#baseurl').val();
    var base_url = link + 'Barang/getBarang';


    var t = $('#dtHorizontalExample').DataTable({
        "processing": true,
        "info": false,
        "searching": true,
        "order": [
            [0, "desc"]
        ],
        lengthChange: false,
        "ajax": {
            "url": base_url,
            "dataSrc": ""
        },
        columns: [
            { "data": "id_barang" },
            { "data": "nama_barang" },
            { "data": "nama_jenis" },
            { "data": "harga", render: function(data){
                return `${formatRupiah(data, 'Rp. ')}`;
            } },
            { "data": "stok" },
        ],

        "destroy": true

    });

    t.on('order.dt search.dt', function() {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


    $('.dataTables_length').addClass('bs-select');
}

{
    var t = $('#dtHorizontalExample').DataTable({
        "processing": true,
        "info": false,

        "order": [
            [0, "desc"]
        ],
        lengthChange: false,
        "ajax": {
            "url": base_url,
            "dataSrc": ""
        },
        columns: [
            { "data": "id_barang" },
            { "data": "nama_barang" },
            { "data": "nama_jenis" },
            { "data": "harga" },
            { "data": "stok" },
        ],

        "destroy": true

    });

    t.on('order.dt search.dt', function() {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


    $('.dataTables_length').addClass('bs-select');
}