<?php
if (isset($_GET['merk'])) {
    $sql = "SELECT * FROM v_produk WHERE nama_merk = '$_GET[merk]'";
    $result = $conn->query($sql);
    $title = $_GET['merk'];
} elseif (isset($_GET['search'])) {
    $sql = "SELECT * FROM v_produk WHERE nama_produk LIKE '%$_GET[search]%'";
    $result = $conn->query($sql);
    $title = "Hasil Pencarian" . ' ' . $_GET['search'];
} else {
    $sql = "SELECT * FROM v_produk";
    $result = $conn->query($sql);
    $title = "Produk";
}


?>
<div class="top_banner version_2">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
        <div class="container">
            <div class="d-flex justify-content-center">
                <h1><?= $title ?></h1>
            </div>
        </div>
    </div>
    <img src="img/slides/3.png" class="img-fluid" alt="">
</div>
<!-- /top_banner -->

<div id="stick_here"></div>

<!-- /toolbox -->

<div class="container margin_30">
    <div class="row small-gutters">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                ?>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="grid_item">
                        <figure>
                            <a href="?page=detail-produk&id=<?= $row['id_produk'] ?>">
                                <img class="img-fluid lazy" src="admin/assets/images/produk/<?= $row['gambar'] ?>"
                                    data-src="admin/assets/images/produk/<?= $row['gambar'] ?>" alt="">
                                <img class="img-fluid lazy" src="admin/assets/images/produk/<?= $row['gambar'] ?>"
                                    data-src="admin/assets/images/produk/<?= $row['gambar'] ?>" alt="">
                            </a>
                        </figure>
                        <a href="?page=detail-produk&id=<?= $row['id_produk'] ?>">
                            <h3><?= $row['nama_produk'] ?></h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?></span>
                        </div>
                        <?php
                        if (isset($_SESSION['level']) && $_SESSION['level'] == 'pelanggan') {
                            ?>
                            <ul>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- /grid_item -->
                </div>
                <?php
            }
            ?>
            <?php
        }
        ?>
        <!-- /col -->


    </div>
    <!-- /row -->

</div>