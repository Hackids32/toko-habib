$(document).ready(function() {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');

});


function konfirmasitrm(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Terima Pesanan ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    })
    .then((result) => {
        if (result.value) {
                window.location.href = base_url + "pesanBarang/proses_terima/" + id;
                
        }
    });

}

function konfirmasikrm(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Kirim Pesanan ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33', 
    })
    .then((result) => {
        if (result.value) {
            window.location.href = base_url + "pesanBarang/proses_kirim/" + id;
                
        }
    });

}

function konfirmasitlk(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Tolak Pesanan ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    })
    .then((result) => {
        if (result.value) {
            window.location.href = base_url + "pesanBarang/proses_tolak/" + id;
                
        }
    });

}