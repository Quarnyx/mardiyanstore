<link href="css/account.css" rel="stylesheet">
<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="?page=home">Home</a></li>
                <li>Halaman Akun</li>
            </ul>
        </div>
        <h1>Informasi Akun</h1>
    </div>
    <!-- /page_header -->
    <?php
    $sqlakun = "SELECT * FROM pengguna INNER JOIN pelanggan WHERE pengguna.id_akun = '$_SESSION[id_akun]'";
    $queryakun = mysqli_query($conn, $sqlakun);
    $dataakun = mysqli_fetch_array($queryakun);

    ?>
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Informasi Akun</h3>
                <div class="form_container">
                    <form action="proses.php?aksi=edit-pelanggan" method="post">
                        <input type="hidden" name="id_akun" value="<?= $dataakun['id_akun'] ?>">
                        <div class="form-group">
                            <input value="<?= $dataakun['username'] ?>" type="email" class="form-control" name="email"
                                id="email_2" placeholder="Email*" readonly>
                        </div>
                        <hr>
                        <div class="private box">
                            <div class="row no-gutters">
                                <div class="col-12 pr-1">
                                    <div class="form-group">
                                        <input value="<?= $dataakun['nama_pelanggan'] ?>" type="text"
                                            class="form-control" name="nama" id="name" placeholder="Nama*" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input value="<?= $dataakun['alamat'] ?>" type="text" class="form-control"
                                            name="alamat" id="address" placeholder="Alamat Lengkap*" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row no-gutters d-none" id="address_2">
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
                                        <input value="<?= $dataakun['kode_pos'] ?>" type="text" class="form-control"
                                            name="kode_pos" placeholder="Kode Pos *" id="kode_pos" readonly>
                                    </div>
                                </div>
                                <div class="col-6 pl-1">
                                    <div class="form-group">
                                        <input value="<?= $dataakun['no_hp'] ?>" type="text" class="form-control"
                                            name="no_hp" placeholder="Nomor Telepon *" id="no_hp" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->

                        </div>
                        <!-- /private -->
                        <hr>
                        <button id="simpan" type="submit" class="btn_1 full-width d-none"
                            style="background-color: green">Simpan</button>

                    </form>
                    <div class="row">
                        <div class="text-center col-6">
                            <button id="edit" value="Daftar" class="btn_1 full-width">Edit Akun</button>

                        </div>
                        <div class="text-center col-6">
                            <button id="ganti-password" class="btn_1 full-width">Ganti Password</button>
                        </div>
                    </div>
                </div>
                <!-- /form_container -->
            </div>
            <!-- /box_account -->

            <!-- /row -->
        </div>
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Informasi Pesanan</h3>
                <div class="form_container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Kode Invoice
                                </th>
                                <th>
                                    Tanggal
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $querycart = mysqli_query($conn, "SELECT * FROM v_penjualandepan WHERE id_akun = '$_SESSION[id_akun]'");
                            while ($rowcart = mysqli_fetch_array($querycart)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $rowcart['kode_penjualan'] ?>
                                    </td>
                                    <td>
                                        <strong><?= $rowcart['tanggal_penjualan'] ?></strong>
                                    </td>
                                    <td>
                                        <strong><?= $rowcart['status'] ?></strong>
                                    </td>
                                    <td>
                                        <a href="?page=pesanan&kode=<?= $rowcart['kode_penjualan'] ?>"
                                            class="btn btn-info">Detail</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /box_account -->
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
<script>
    $(document).ready(function () {
        $('#edit').click(function () {
            $('#name').removeAttr('readonly');
            $('#address').removeAttr('readonly');
            $('#provinceDropdown').removeAttr('disabled');
            $('#cityDropdown').removeAttr('disabled');
            $('#kode_pos').removeAttr('readonly');
            $('#no_hp').removeAttr('readonly');
            $('#edit').addClass('d-none');
            $('#address_2').removeClass('d-none');
            $('#ganti-password').addClass('d-none');
            $('#simpan').removeClass('d-none');
        });

        $('#ganti-password').click(function () {
            alertify.prompt('Ganti Password', 'Ganti Password', ''
                , function (evt, value) {
                    $.ajax({
                        url: 'proses.php?aksi=ganti-password&id_akun=' + <?= $dataakun['id_akun'] ?>,
                        method: 'POST',
                        data: {
                            'password': value
                        },
                        success: function (data) {
                            alertify.success('Password Berhasil Diganti');
                        }
                    })
                }
                , function () { alertify.error('Cancel') });

        });
    })
</script>
<script script script src="ongkir.js"></script>