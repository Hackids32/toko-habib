<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                <img width="100px" src="<?= base_url() ?>assets/icon/hitam1.png" alt="">
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="user" name="user" aria-describedby="usernameHelp"
                                            placeholder="Username" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="pwd" name="pwd" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                    </div>
                                    <a href="#" onclick="proses_login()" id="login"
                                        class="btn btn-bata btn-user btn-block shadow">
                                        <b>Login
                                    </a>
                                    <br>
                                    <br>
                                    <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/login.js"></script>
