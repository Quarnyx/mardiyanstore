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
                <nav class="col-xl-6 col-lg-7">
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
                                <a href="javascript:void(0);" class="show-submenu">Produk</a>
                                <ul>
                                    <?php
                                    $sql = "SELECT * FROM merk";
                                    $query = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <li><a href="?page=produk&merk=<?= $row['id_merk'] ?>"><?= $row['nama_merk'] ?></a>
                                        </li>
                                        <?php
                                    }

                                    ?>
                                </ul>
                            </li>
                            <li>
                                <a href="blog.html">Tentang Kami</a>
                            </li>
                            <li>
                                <a href="#0">Kontak Kami</a>
                            </li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
                    <a class="phone_top" href="tel://9438843343"><strong><span>Whatsapp</span>08252525255</strong></a>
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
                                    <a href="#">
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
                                                        href="?page=produk&merk=<?= $row['id_merk'] ?>"><?= $row['nama_merk'] ?></a></span>
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
                        <input type="text" placeholder="Search over 10.000 products">
                        <button type="submit"><i class="header-icon_search_custom"></i></button>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="cart.html" class="cart_bt"></a>
                                <div id="cart_box" class="dropdown-menu">

                                </div>
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
                                                <a href="account.html"><i class="ti-user"></i>Profile Saya</a>
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
                                Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <input type="text" class="form-control" placeholder="Search over 10.000 products">
            <input type="submit" class="btn_1 full-width" value="Search">
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>