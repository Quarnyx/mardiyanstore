<link href="css/account.css" rel="stylesheet">
<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="?page=home">Home</a></li>
                <li>Login atau daftar</li>
            </ul>
        </div>
        <h1>Login atau Buat Akun</h1>
    </div>
    <!-- /page_header -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Login</h3>
                <div class="form_container">
                    <form action="cek-login.php" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" value=""
                                placeholder="Password*">
                        </div>
                        <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width">
                        </div>
                    </form>
                </div>
                <!-- /form_container -->
            </div>
            <!-- /box_account -->

            <!-- /row -->
        </div>
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="new_client">Daftar Akun</h3> <small class="float-right pt-2">* Wajib diisi
                </small>
                <div class="form_container">
                    <form action="proses.php?aksi=daftar" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email_2" placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password_in_2" value=""
                                placeholder="Password*">
                        </div>
                        <hr>
                        <div class="private box">
                            <div class="row no-gutters">
                                <div class="col-12 pr-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama" id="name"
                                            placeholder="Nama*">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="alamat" id="address"
                                            placeholder="Alamat Lengkap*">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row no-gutters">
                                <div class="col-6 pr-1">
                                    <div class="form-group">
                                        <select class="wide add_bottom_10" id="provinceDropdown" name="province_id">
                                            <option value="aaa">Pilih Provinsi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 pr-1">
                                    <div class="form-group">
                                        <select id="cityDropdown" class="wide add_bottom_10" name="city_id">
                                            <option value="aaa">Pilih Kota</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->

                            <div class="row no-gutters">
                                <div class="col-6 pr-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="kode_pos"
                                            placeholder="Kode Pos *">
                                    </div>
                                </div>
                                <div class="col-6 pl-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="no_hp"
                                            placeholder="Nomor Telepon *">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->

                        </div>
                        <!-- /private -->
                        <hr>
                        <div class="text-center"><input type="submit" value="Daftar" class="btn_1 full-width">
                        </div>
                </div>
                <!-- /form_container -->
            </div>
            <!-- /box_account -->
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
<script src="ongkir.js"></script>