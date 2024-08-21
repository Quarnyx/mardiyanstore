<link href="css/cart.css" rel="stylesheet">
<?php
$id_akun = $_SESSION['id_akun'];
$sqlcart = "SELECT * FROM v_keranjang WHERE id_akun = $id_akun";
$querycart = mysqli_query($conn, $sqlcart);
?>
<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Category</a></li>
                <li>Page active</li>
            </ul>
        </div>
        <h1>Cart page</h1>
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
                    <td class="options">
                        <a data-id="<?= $rowcart['id_detail_penjualan'] ?>" class="action remove-cart"><i
                                class="ti-trash "></i></a>
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

<div class="box_cart">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <ul>
                    <li>
                        <span>Total</span> Rp <?php echo number_format($subtotal, 0, ',', '.') ?>
                    </li>
                </ul>
                <a href="?page=pembayaran" class="btn_1 full-width cart">Pembayaran</a>
            </div>
        </div>
    </div>
</div>
<!-- /box_cart -->
<script>
    $(document).ready(function () {
        $(".remove-cart").click(function () {
            id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "proses.php?aksi=hapus-keranjang",
                data: 'id=' + id,
                success: function (data) {
                    loadCart();
                    location.reload();
                }
            });
        });
    });
</script>