<header class="version_1">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="?page=home"><img src="img/logo.png" alt="" width="100"></a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7" style="text-align-last: center;">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="?page=home"><img src="img/logo_black.png" alt="" width="100"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            <li class="">
                                <a href="?page=home">Home</a>
                            </li>
                            <li class="submenu">
                                <a href="?page=produk" class="show-submenu">Produk</a>
                                <ul>
                                    <?php
                                    $sql = "SELECT * FROM merk";
                                    $query = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <li><a
                                                href="?page=produk&merk=<?= $row['nama_merk'] ?>"><?= $row['nama_merk'] ?></a>
                                        </li>
                                        <?php
                                    }

                                    ?>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=kontak">Kontak Kami</a>
                            </li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
                    <a class="phone_top"
                        href="https://wa.me/6283865007064"><strong><span>Whatsapp</span>083865007064</strong></a>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <nav class="categories">
                        <ul class="clearfix">
                            <li><span>
                                    <a href="?page=produk">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        Produk
                                    </a>
                                </span>
                                <div id="menu">
                                    <ul>
                                        <?php
                                        $sql = "SELECT * FROM merk";
                                        $query = mysqli_query($conn, $sql);

                                        while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <li><span><a
                                                        href="?page=produk&merk=<?= $row['nama_merk'] ?>"><?= $row['nama_merk'] ?></a></span>
                                            </li>
                                            <?php
                                        }

                                        ?>

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <div class="custom-search-input">
                        <form action="" method="get">
                            <input type="hidden" name="page" value="produk">
                            <input type="text" name="search" placeholder="Cari produk">
                            <button type="submit"><i class="header-icon_search_custom"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">

                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="cart.html" class="cart_bt"></a>
                                <?php
                                if (isset($_SESSION['level']) && $_SESSION['level'] == 'pelanggan') {
                                    ?>
                                    <div id="cart_box" class="dropdown-menu">

                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <!-- /dropdown-cart-->
                        </li>

                        <li>
                            <div class="dropdown dropdown-access">
                                <a href="?page=login" class="access_link"><span>Akun</span></a>
                                <div class="dropdown-menu">
                                    <?php

                                    if (isset($_SESSION['username'])) {
                                        ?>
                                        <h6>Halo, <?= $_SESSION['username'] ?></h6>
                                        <ul>
                                            <li>
                                                <a href="?page=akun"><i class="ti-user"></i>Profile Saya</a>
                                            </li>
                                            <li>
                                                <a href="logout.php"><i class="ti-power-off"></i>Keluar</a>
                                            </li>
                                        </ul>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="?page=login" class="btn_1">Login</a>
                                    <?php }
                                    ?>

                                </div>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                        </li>
                        <li>
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                Kategori
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <form action="" method="get">
                <input type="hidden" name="page" value="produk">
                <input type="text" class="form-control" name="search" placeholder="Cari produk">
                <button type="submit"><i class="btn_1 full-width" value="Search"></i></button>
            </form>
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>