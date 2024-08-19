<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        <div class="owl-slide cover" style="background-image: url(img/slides/slide_home_2.jpg);">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-end">
                        <div class="col-lg-6 static">
                            <div class="slide-text text-end white">
                                <h2 class="owl-slide-animated owl-slide-title">Attack Air<br>Max 720 Sage
                                    Low</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Limited items available at this price
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                        href="listing-grid-1-full.html" role="button">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
        <div class="owl-slide cover" style="background-image: url(img/slides/slide_home_1.jpg);">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 static">
                            <div class="slide-text white">
                                <h2 class="owl-slide-animated owl-slide-title">Attack Air<br>VaporMax
                                    Flyknit 3</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Limited items available at this price
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                        href="listing-grid-1-full.html" role="button">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
        <div class="owl-slide cover" style="background-image: url(img/slides/slide_home_3.jpg);">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-12 static">
                            <div class="slide-text text-center black">
                                <h2 class="owl-slide-animated owl-slide-title">Attack Air<br>Monarch IV SE
                                </h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Lightweight cushioning and durable support with a Phylon midsole
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
                                        href="listing-grid-1-full.html" role="button">Shop Now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
        </div>
    </div>
    <div id="icon_drag_mobile"></div>
</div>
<!--/carousel-->



<div class="container margin_60_35">
    <div class="main_title">
        <h2>Top Selling</h2>
        <span>Products</span>
        <p>Produk unggulan dan berkualitas dari kami</p>
    </div>
    <div class="row small-gutters">
        <?php
        $sql = "SELECT * FROM v_thumbnailproduk ORDER BY id_produk DESC";
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

        <!-- /col -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="featured lazy" data-bg="url(img/featured_home.jpg)">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <h3>Armor<br>Air Color 720</h3>
                    <p>Lightweight cushioning and durable support with a Phylon midsole</p>
                    <div class="feat_text_block">
                        <div class="price_box">
                            <span class="new_price">$90.00</span>
                            <span class="old_price">$170.00</span>
                        </div>
                        <a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /featured -->



<div class="bg_gray">
    <div class="container margin_30">
        <div id="brands" class="owl-carousel owl-theme">
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt=""
                        class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt=""
                        class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt=""
                        class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt=""
                        class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt=""
                        class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt=""
                        class="owl-lazy"></a>
            </div><!-- /item -->
        </div><!-- /carousel -->
    </div><!-- /container -->
</div>
<!-- /bg_gray -->