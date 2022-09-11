$(document).ready(function() {
    ambilBm();
});

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

function filter() {
    var tglawal = $("[name='tglawal']").val();
    var tglakhir = $("[name='tglakhir']").val();
    if (tglawal != '' && tglakhir != '') {
        filterBm(tglawal, tglakhir);
    } else {
        validasi("Tanggal Filter wajib di isi!", "warning");
    }
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

function reset() {
    $("[name='tglawal']").val("");
    $("[name='tglakhir']").val("");
    ambilBm();
}

function ambilBm() {
    var link = $('#baseurl').val();
    var base_url = link + 'BarangMasuk/getBarangMasuk';


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
            { "data": "id_barang_masuk" },
            { "data": "tgl_masuk" },
            { "data": "id_barang_masuk" },
            { "data": "nama_supplier" },
            { "data": "nama_barang" },
            { "data": "harga_msk", render: function(data){
                return `${formatRupiah(data, 'Rp. ')}`;
            } },
            { "data": "jumlah_masuk" },
            { "data": "id_barang_masuk", render: function(data,type,full) {
                return formatRupiah(`${full.harga_msk * full.jumlah_masuk}`, 'Rp. ');
            } },
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

function filterBm(tglawal, tglakhir) {
    var link = $('#baseurl').val();
    var base_url = link + 'BarangMasuk/filterBarangMasuk/' + tglawal + '/' + tglakhir + '';


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
            { "data": "id_barang_masuk" },
            { "data": "tgl_masuk" },
            { "data": "id_barang_masuk" },
            { "data": "nama_supplier" },
            { "data": "nama_barang" },
            { "data": "harga_msk", render: function(data){
                return `${formatRupiah(data, 'Rp. ')}`;
            } },
            { "data": "jumlah_masuk" },
            { "data": "id_barang_masuk", render: function(data,type,full) {
                return formatRupiah(`${full.harga_msk * full.jumlah_masuk}`, 'Rp. ');
            } },
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