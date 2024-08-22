<?php include('layout/head.php'); ?>

<body>
    <div class="container-fluid overflow-hidden">
        <div class="bg-overlay"></div>
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-10 col-md-6 col-lg-4 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center">


                            <h4 class="mt-4">Selamat Datang !</h4>
                            <p class="text-muted">Login untuk melanjutkan ke apliasi.</p>
                        </div>

                        <div class="p-2 mt-5">
                            <form class="" action="cek-login.php" method="post">
                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16 " id="basic-addon1"><i
                                            class="mdi mdi-account-outline auti-custom-input-icon"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter username"
                                        aria-label="Username" aria-describedby="basic-addon1" name="username">
                                </div>

                                <div class="input-group auth-form-group-custom mb-3">
                                    <span class="input-group-text bg-primary bg-opacity-10 fs-16" id="basic-addon2"><i
                                            class="mdi mdi-lock-outline auti-custom-input-icon"></i></span>
                                    <input type="password" class="form-control" id="userpassword"
                                        placeholder="Enter password" aria-label="Username"
                                        aria-describedby="basic-addon1" name="password">
                                </div>

                                <?php
                                if (isset($_GET['username'])) {
                                    echo '<div class="alert alert-danger" role="alert">Username salah</div>';

                                } elseif (isset($_GET['pass'])) {
                                    echo '<div class="alert alert-danger" role="alert">Password salah</div>';
                                }
                                ?>

                                <div class="pt-3 text-center">
                                    <button class="btn btn-primary w-xl waves-effect waves-light" type="submit">Log
                                        In</button>
                                </div>

                            </form>
                        </div>

                        <div class="mt-5 text-center">
                            <p>©
                                <script>document.write(new Date().getFullYear())</script> Mardiyan Store <i
                                    class="mdi mdi-heart text-danger"></i> by Mardiyan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('layout/footer.php'); ?>

</body>

</html>