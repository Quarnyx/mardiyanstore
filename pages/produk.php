<?php
$sql = "SELECT * FROM v_produk WHERE id_merk = '$_GET[merk]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

?>
<div class="top_banner version_2">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
        <div class="container">
            <div class="d-flex justify-content-center">
                <h1><?= $row['nama_merk'] ?></h1>
            </div>
        </div>
    </div>
    <img src="img/bg_cat_shoes.jpg" class="img-fluid" alt="">
</div>
<!-- /top_banner -->

<div id="stick_here"></div>

<!-- /toolbox -->

<div class="container margin_30">
    <div class="row small-gutters">
        <?php
        $sql = "SELECT * FROM v_thumbnailproduk WHERE id_merk = '$_GET[merk]'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
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
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
                            </li>
                        </ul>
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