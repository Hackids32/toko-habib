$(document).ready(function() {
    ambilBk();
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
        filterBk(tglawal, tglakhir);
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
    ambilBk();
}

function ambilBk() {
    var link = $('#baseurl').val();
    var base_url = link + 'BarangKeluar/getBarangKeluar';


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
            { "data": "id_barang_keluar" },
            { "data": "tgl_keluar" },
            { "data": "id_barang_keluar" },
            { "data": "nama_reseller" },
            { "data": "nama_barang" },
            { "data": "harga_kel", render: function(data){
                return `${formatRupiah(data, 'Rp. ')}`;
            } },
            { "data": "jumlah_keluar" },
            { "data": "id_barang_keluar", render: function(data,type,full) {
                return formatRupiah(`${full.harga_kel * full.jumlah_keluar}`, 'Rp. ');
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

function filterBk(tglawal, tglakhir) {
    var link = $('#baseurl').val();
    var base_url = link + 'BarangKeluar/filterBarangKeluar/' + tglawal + '/' + tglakhir + '';


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
            { "data": "id_barang_keluar" },
            { "data": "tgl_keluar" },
            { "data": "id_barang_keluar" },
            { "data": "nama_reseller" },
            { "data": "nama_barang" },
            { "data": "harga_kel", render: function(data){
                return `${formatRupiah(data, 'Rp. ')}`;
            } },
            { "data": "jumlah_keluar" },
            { "data": "id_barang_keluar", render: function(data,type,full) {
                return formatRupiah(`${full.harga_kel * full.jumlah_keluar}`, 'Rp. ');
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