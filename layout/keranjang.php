<ul>
    <?php
    require_once('../config.php');
    session_start();
    $id_akun = $_SESSION['id_akun'];
    $sqlcart = "SELECT * FROM v_keranjang WHERE id_akun = $id_akun";
    $querycart = mysqli_query($conn, $sqlcart);

    while ($rowcart = mysqli_fetch_array($querycart)) {
        ?>
        <li>
            <a href="product-detail-1.html">
                <figure><img src="admin/assets/images/produk/<?= $rowcart['gambar'] ?>"
                        data-src="admin/assets/images/produk/<?= $rowcart['gambar'] ?>" alt="" width="50" height="50"
                        class="lazy"></figure>
                <strong><span><?= $rowcart['nama_produk'] . ' - ' . $rowcart['ukuran'] . ' - ' . $rowcart['warna'] ?></span>Rp
                    <?= number_format($rowcart['harga_jual'], 0, ',', '.') ?></strong>
            </a>
            <a data-id="<?= $rowcart['id_detail_penjualan'] ?>" class="action remove-cart"><i class="ti-trash"></i></a>
        </li>
        <?php
    }
    ?>
</ul>
<div class="total_drop">
    <a href="?page=keranjang" class="btn_1 outline">Lihat Keranjang</a><a href="checkout.html" class="btn_1">Bayar </a>
</div>
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
                }
            });
        });
    });
</script>