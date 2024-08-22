<link href="css/cart.css" rel="stylesheet">
<link href="css/account.css" rel="stylesheet">

<?php
$sqlcart = "SELECT * FROM v_pesanan WHERE kode_penjualan = '" . $_GET['kode'] . "'";
$querycart = mysqli_query($conn, $sqlcart);
?>
<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Home</a></li>
                <li>Pesanan</li>
            </ul>
        </div>
        <h1>Detail Pesanan <?= $_GET['kode'] ?></h1>
    </div>
    <!-- /page_header -->
    <table class="table table-striped cart-list">
        <thead>
            <tr>
                <th>
                    Produk
                </th>
                <th>
                    Harga
                </th>
                <th>
                    Jumlah
                </th>
                <th>
                    Subtotal
                </th>
                <th>

                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $subtotal = 0;
            while ($rowcart = mysqli_fetch_array($querycart)) {
                ?>
                <tr>
                    <td>
                        <div class="thumb_cart">
                            <img src="admin/assets/images/produk/<?= $rowcart['gambar'] ?>"
                                data-src="admin/assets/images/produk/<?= $rowcart['gambar'] ?>" class="lazy" alt="Image">
                        </div>
                        <span
                            class="item_cart"><?= $rowcart['nama_produk'] . ' - ' . $rowcart['ukuran'] . ' - ' . $rowcart['warna'] ?></span>
                    </td>
                    <td>
                        <strong>Rp <?= number_format($rowcart['harga_jual'], 0, ',', '.') ?></strong>
                    </td>
                    <td>
                        <div>
                            <input type="text" value="<?php echo $rowcart['jumlah'] ?>" id="quantity_1" class="qty2"
                                name="quantity_1" readonly>
                        </div>
                    </td>
                    <td>
                        <strong>Rp
                            <?php echo number_format($rowcart['harga_jual'] * $rowcart['jumlah'], 0, ',', '.') ?></strong>
                    </td>

                </tr>
                <?php
                $subtotal += $rowcart['harga_jual'] * $rowcart['jumlah'];
            }
            ?>
        </tbody>
    </table>
    <!-- /cart_actions -->

</div>
<!-- /container -->

<?php
$sql = "SELECT * FROM v_penjualandepan WHERE kode_penjualan = '" . $_GET['kode'] . "'";
$query = mysqli_query($conn, $sql);
$rowcart = mysqli_fetch_array($query);
?>
<div class="container margin_30">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Status Pesanan</h3>
                <div class="form_container">
                    <div class="form-group">
                        <label>Status Pesanan</label>
                        <input type="text" class="form-control form-control-lg" value="<?= $rowcart['status'] ?>"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pesanan</label>
                        <input type="text" class="form-control form-control-lg"
                            value="<?= $rowcart['tanggal_penjualan'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Pengiriman</label>
                        <input type="text" class="form-control form-control-lg" value="<?= $rowcart['pengiriman'] ?>"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label>No Resi</label>
                        <input type="text" class="form-control form-control-lg" value="<?= $rowcart['no_resi'] ?>"
                            readonly placeholder="-">
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
                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control form-control-lg" value="<?= $rowcart['total'] ?>"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <input type="text" class="form-control form-control-lg" value="<?= $rowcart['pembayaran'] ?>"
                            readonly>
                    </div>
                    <a target="_blank" href="https://wa.me/628464464" class="btn_1 full-width cart">Konfirmasi
                        Pembayaran</a>
                </div>
            </div>
            <!-- /box_account -->
        </div>
    </div>
</div>