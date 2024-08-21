<link href="css/checkout.css" rel="stylesheet">

<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="?page=home">Home</a></li>
                <li>>Pembayaran</li>
            </ul>
        </div>
        <h1>Halaman Pembayaran</h1>

    </div>
    <!-- /page_header -->
    <?php
    $sqlakun = "SELECT * FROM pengguna INNER JOIN pelanggan WHERE pengguna.id_akun = '$_SESSION[id_akun]'";
    $queryakun = mysqli_query($conn, $sqlakun);
    $dataakun = mysqli_fetch_array($queryakun);

    ?>
    <form action="proses.php?aksi=pembayaran" method="POST">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="step first">
                    <h3>1. Informasi pelanggan</h3>
                    <div class="payment_info d-none d-sm-block">
                        <p>Pastikan alamat sudah benar, <br>jika belum ubah di halaman akun.</p>
                    </div>
                    <div class="tab-content checkout">
                        <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email"
                                    value="<?= $dataakun['username'] ?>" readonly>
                            </div>
                            <hr>
                            <div class="row no-gutters">
                                <div class="col-12 form-group pr-1">
                                    <input type="text" class="form-control" placeholder="Nama"
                                        value="<?= $dataakun['nama_pelanggan'] ?>" readonly>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="form-group">
                                <textarea type="text" class="form-control" placeholder="Alamat" rows="3"
                                    readonly><?= $dataakun['alamat'] ?></textarea>
                            </div>

                            <!-- /row -->
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Telephone"
                                    value="<?= $dataakun['no_hp'] ?>" readonly>
                            </div>

                            <hr>
                        </div>
                        <!-- /tab_1 -->
                        <input type="hidden" value="<?= $dataakun['province_id'] ?>" name="province_id">
                        <input type="hidden" value="<?= $dataakun['city_id'] ?>" id="destination" name="city_id">
                        <input type="hidden" value="399" id="origin">
                    </div>
                </div>
                <!-- /step -->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="step middle payments">
                    <h3>2. Pembayaran dan Pengiriman</h3>
                    <ul>
                        <li>
                            <label class="container_radio">BRI - 1234567890(a/n. Mardiyan)
                                <input type="radio" name="pembayaran" checked value="BRI">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_radio">Dana - 08123456789(a/n. Mardiyan)
                                <input type="radio" name="pembayaran" value="Dana">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="container_radio">Shopeepay - 08123456789(a/n. Mardiyan)
                                <input type="radio" name="pembayaran" value="Shopeepay">
                                <span class="checkmark"></span>
                            </label>
                        </li>

                    </ul>
                    <div class="payment_info d-none d-sm-block">
                        <p>Kirim bukti transfer ke kontak Whatsapp kami dan pesanan akan langsung kami proses.</p>
                    </div>

                    <h6 class="pb-2">Pengiriman</h6>


                    <ul id="pengiriman">

                    </ul>

                </div>
                <!-- /step -->

            </div>
            <?php
            $id_akun = $_SESSION['id_akun'];
            $sqlcart = "SELECT * FROM v_keranjang WHERE id_akun = $id_akun";
            $querycart = mysqli_query($conn, $sqlcart);
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="step last">
                    <h3>3. Ringkasan Pesanan</h3>
                    <div class="box_general summary">
                        <ul>
                            <?php
                            $subtotal = 0;
                            while ($rowcart = mysqli_fetch_array($querycart)) {
                                ?>
                                <li class="clearfix"><em><?= $rowcart['jumlah'] ?>x
                                        <?= $rowcart['nama_produk'] . ' - ' . $rowcart['ukuran'] . ' - ' . $rowcart['warna'] ?></em>
                                    <span>Rp.
                                        <?= number_format($rowcart['harga_jual'] * $rowcart['jumlah'], 0, ',', '.') ?></span>
                                </li>
                                <?php
                                $subtotal += $rowcart['harga_jual'] * $rowcart['jumlah'];
                            } ?>
                        </ul>
                        <ul>
                            <li class="clearfix"><em><strong>Subtotal</strong></em> <span>Rp.
                                    <?= number_format($subtotal, 0, ',', '.') ?></span></li>
                            <input type="hidden" class="subtotal" name="subtotal" value="<?= $subtotal ?>">
                            <li class="clearfix"><em><strong>Pengiriman</strong></em> <span class="harga-kirim"></span>
                            </li>

                        </ul>
                        <div class="total clearfix">TOTAL <span class="total"></span></div>
                        <input type="hidden" name="total" class="total">
                        <input type="hidden" name="id_akun" value="<?= $dataakun['id_akun'] ?>">
                        <input type="hidden" name="harga-kirim" class="harga-kirim">

                        <button type="submit" class="btn_1 full-width">Konfirmasi dan Bayar</button>
                    </div>
                    <!-- /box_general -->
                </div>
                <!-- /step -->
            </div>
        </div>
    </form>
    <!-- /row -->
</div>
<!-- /container -->
<script>
    $(document).ready(function () {
        var destination = $('#destination').val();
        var origin = $('#origin').val();
        var courier = 'jne';
        var weight = 1000;
        // Load provinces on page load
        if (origin && destination && weight && courier) {
            $.ajax({
                url: 'proxy.php', // URL to your PHP proxy script
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'cost',
                    origin: origin,
                    destination: destination,
                    weight: weight,
                    courier: courier
                },
                success: function (data) {
                    console.log("Courier cost data:", data); // Log the response data
                    if (data && data.rajaongkir && data.rajaongkir.results) {
                        var costs = data.rajaongkir.results[0].costs;
                        var pengiriman = $('#pengiriman');
                        $.each(costs, function (index, cost) {
                            console.log("Adding courier service:", cost.service); // Log each service
                            pengiriman.append(`
                            <li>
                                <label class="container_radio">${cost.service} | Rp ${cost.cost[0].value} | ${cost.cost[0].etd} Hari 
                                    <input type="radio" name="pengiriman" id="pengiriman" value="${cost.service}" data-harga="${cost.cost[0].value}">
                                    <span class="checkmark"></span>
                                </label>
                            </li>`
                            );
                        });
                    } else {
                        console.error('Failed to load courier data.');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching courier data:', textStatus, errorThrown);
                }
            });
        } else {
            alert('Please fill in all the fields.');
        }

    });
    $(document).on('change', 'input[name="pengiriman"]', function () {
        var subtotal = parseFloat($('.subtotal').val());
        var cost = parseFloat($(this).data('harga'));
        var total = subtotal + cost
        $('.total').val(total);
        $('.harga-kirim').val(cost);

        var rupiah = Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(total);
        $('.total').text('TOTAL ' + rupiah);
        $('.harga-kirim').text('Rp. ' + cost);

    });


</script>