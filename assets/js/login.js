function proses_login() {

    var usr = $("[name='user']").val();
    var pwd = $("[name='pwd']").val();

    if (usr == "") {
        validasi('Masukkan Username!', 'warning');
        return false;
    } else if (pwd == '') {
        validasi('Massukkan Password!', 'warning');
        return false;
    } else {
        cek_user(usr, pwd);
    }

}

function cek_user(usr, pwd) {
    var link = $('#baseurl').val();
    var base_url = link + 'login/proses_login';

    $.ajax({
        type: 'POST',
        data: {
            user: usr,
            pwd: pwd
        },
        url: base_url,
        dataType: 'json',
        success: function(hasil) {
            if (hasil.respon == 'success') {
                pesan('Berhasil Login!', 'success', 'true');
                $("#login").text("Login");
            } else {
                pesan('User & Password salah!', 'error', 'false');
                $("#login").text("Login");

            }
        }
    });

}

function logout() {

    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Anda ingin logout?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#d33',
        cancelButtonText: 'Tidak',
        cancelButtonColor: '#4e73df'
    }).then((result) => {
        if (result.value) {
            
            window.location.href = base_url + "login/logout/";
        }
    });

}

function pesan(judul, status, boolean) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
        showConfirmButton: true,
    }).then((result) => {
        if (boolean == 'true') {
            
            location.reload(true);
        }
    });
}

function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    }).then((result) => {

    });
}