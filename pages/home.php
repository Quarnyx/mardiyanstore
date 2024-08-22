<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        <div class="owl-slide cover" style="background-image: url(img/slides/1.png">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-12 static">
                            <div class="slide-text text-center white">
                                <h2 class="owl-slide-animated owl-slide-title is-transitioned">Mardiyan<br>Shoes Store
                                </h2>
                                <p class="owl-slide-animated owl-slide-subtitle is-transitioned">
                                    Toko sepatu yang terpercaya
                                </p>
                                <div class="owl-slide-animated owl-slide-cta is-transitioned"><a class="btn_1"
                                        href="?page=produk" role="button">Beli Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
        <div class="owl-slide cover" style="background-image: url(img/slides/2.png);">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 static">
                            <div class="slide-text white">
                                <h2 class="owl-slide-animated owl-slide-title">Mardiyan<br>Shoes Store</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Toko sepatu yang terpercaya
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="?page=produk"
                                        role="button">Beli Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
    </div>
    <div id="icon_drag_mobile"></div>
</div>
<!--/carousel-->



<div class="container margin_60_35">
    <div class="main_title">
        <h2>Produk Unggulan</h2>
        <span>Products</span>
        <p>Produk unggulan dan berkualitas dari kami</p>
    </div>
    <div class="row small-gutters">
        <?php
        $sql = "SELECT * FROM v_thumbnailproduk ORDER BY id_produk DESC LIMIT 12";
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

        <!-- /col -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="featured lazy" data-bg="url(img/slides/1.png)">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <h3>Mardiyan<br>Shoes Store</h3>
                    <p>Toko sepatu yang terpercaya</p>
                    <div class="feat_text_block">
                        <a class="btn_1" href="?page=produk" role="button">Belanja Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /featured -->