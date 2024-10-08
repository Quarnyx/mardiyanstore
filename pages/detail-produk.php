<div class="container margin_30">
    <?php
    $sql = "SELECT * FROM v_produk WHERE id_produk = " . $_GET['id'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="all">
                <div class="slider">
                    <div class="owl-carousel owl-theme main">
                        <?php
                        $sql = "SELECT * FROM gambar_produk WHERE id_produk = " . $_GET['id'];
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($gambar = $result->fetch_assoc()) {


                                ?>
                                <div style="background-image: url(admin/assets/images/produk/<?= $gambar['gambar'] ?>);"
                                    class="item-box"></div>
                                <?php
                            }
                        } ?>

                    </div>
                    <div class="left nonl"><i class="ti-angle-left"></i></div>
                    <div class="right"><i class="ti-angle-right"></i></div>
                </div>
                <div class="slider-two">
                    <div class="owl-carousel owl-theme thumbs">
                        <?php
                        $sql = "SELECT * FROM gambar_produk WHERE id_produk = " . $_GET['id'];
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($gambar = $result->fetch_assoc()) {


                                ?>
                                <div style="background-image: url(admin/assets/images/produk/<?= $gambar['gambar'] ?>);"
                                    class="item"></div>
                                <?php
                            }
                        } ?>
                    </div>
                    <div class="left-t nonl-t"></div>
                    <div class="right-t"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="?page=home">Home</a></li>
                    <li><a href="?page=produk">Produk</a></li>
                    <li><a href="?page=detail-produk&id=<?= $row['id_produk'] ?>"><?= $row['nama_produk'] ?></a></li>
                </ul>
            </div>
            <!-- /page_header -->
            <div class="prod_info">
                <h1><?= $row['nama_produk'] ?></h1>
                <div class="prod_options">
                    <div class="row">
                        <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Warna</strong></label>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            <div class="custom-select-form">
                                <select class="wide" id="warna">
                                    <?php
                                    $sql = "SELECT * FROM variasi_produk WHERE id_produk = " . $_GET['id'] . " GROUP BY warna";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($warna = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?= $warna['warna'] ?>"><?= $warna['warna'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Ukuran</strong></label>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            <div class="custom-select-form">
                                <select class="wide" id="ukuran">
                                    <?php
                                    $sql = "SELECT * FROM variasi_produk WHERE id_produk = " . $_GET['id'] . " GROUP BY ukuran";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($ukuran = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?= $ukuran['ukuran'] ?>"><?= $ukuran['ukuran'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Jumlah</strong></label>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            <div class="numbers-row">
                                <input type="text" value="1" id="jumlah" class="qty2" name="jumlah">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Stok</strong></label>
                        <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong id="stok">Pilih
                                    variasi</strong></label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="price_main"><span class="new_price">Rp
                                <?= number_format($row['harga_jual'], 0, ',', '.') ?></span></div>
                    </div>
                    <?php
                    if (isset($_SESSION['level']) && $_SESSION['level'] == 'pelanggan') {
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn_add_to_cart"><button id="tambah-keranjang" class="btn_1"><i
                                        class="ti-shopping-cart"></i>
                                    Keranjang</button></div>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn_add_to_cart"><a href="?page=login" class="btn_1"><i class="ti-lock"></i>
                                    Login</a></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- /prod_info -->
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="tabs_product">
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Deskripsi</a>
            </li>
        </ul>
    </div>
</div>
<!-- /tabs_product -->
<div class="tab_content_wrapper">
    <div class="container">
        <div class="tab-content" role="tablist">
            <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                <div class="card-header" role="tab" id="heading-A">
                    <h5 class="mb-0">
                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false"
                            aria-controls="collapse-A">
                            Deskripsi
                        </a>
                    </h5>
                </div>
                <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <h3>Detail</h3>
                                <?= $row['detail'] ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /tab-content -->
    </div>
    <!-- /container -->
</div>
<!-- /tab_content_wrapper -->
<script>
    $(document).ready(function () {
        $("#ukuran, #warna").change(function () {
            id_produk = <?= $_GET['id'] ?>;
            warna = $("#warna").val();
            ukuran = $("#ukuran").val();
            console.log(id_produk, warna, ukuran);
            $.ajax({
                type: "POST",
                url: "proses.php?aksi=cek-stok",
                data: 'warna=' + warna + '&ukuran=' + ukuran + '&id_produk=' + id_produk,
                success: function (data) {
                    $("#stok").html(data);
                    if (data == 0) {
                        $("#tambah-keranjang").prop("disabled", true);
                    } else {
                        $("#tambah-keranjang").prop("disabled", false);
                    }
                }
            });
        });

        $("#tambah-keranjang").click(function () {
            id_produk = <?= $_GET['id'] ?>;
            warna = $("#warna").val();
            ukuran = $("#ukuran").val();
            jumlah = $("#jumlah").val();
            $id_akun = <?= $_SESSION['id_akun'] ?>;
            harga_beli = <?= $row['harga_beli'] ?>;
            harga_jual = <?= $row['harga_jual'] ?>;
            $.ajax({
                type: "POST",
                url: "proses.php?aksi=tambah-keranjang",
                data:
                    'warna=' + warna +
                    '&ukuran=' + ukuran +
                    '&id_produk=' + id_produk +
                    '&jumlah=' + jumlah +
                    '&id_akun=' + $id_akun +
                    '&harga_beli=' + harga_beli +
                    '&harga_jual=' + harga_jual,
                success: function (response) {
                    alertify.success('Berhasil Ditambahkan Ke Keranjang');
                    loadCart();
                }
            });
        });
    });
</script>