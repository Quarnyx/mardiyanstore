<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_1">Pintasan</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="?page=produk">Produk</a></li>
                        <li><a href="?page=kontak">Kontak</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_2">Kategori</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <ul>
                        <?php
                        $sql = "SELECT * FROM merk";
                        $query = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <li><a href="?page=produk&merk=<?= $row['nama_merk'] ?>"><?= $row['nama_merk'] ?></a>
                            </li>
                            <?php
                        }

                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_3">Kontak</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i>Jl Tlogosari Semarang<br> Jembatan 3</li>
                        <li><i class="ti-headphone-alt"></i>083865007064</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-12">
                <ul class="additional_links" style="float: left !important">
                    <li><span>© 2024 Mardiyan</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>