<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Selamat Datang, <span
                        class="text-primary"><?php echo $_SESSION['username']; ?></span></h4>
                <p class="text-muted mb-0">Berikut ringkasan informasi</p>
            </div>
        </div>
    </div>
</div>
<!--    end row -->

<div class="row">
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header">
                <div class="card-icon">
                    <i class="fas fa-cart-plus fs-14 text-muted"></i>
                </div>
                <h4 class="card-title mb-0">Ringkasan Transaksi</h4>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card bg-danger-subtle"
                            style="background: url('assets/images/dashboard/dashboard-shape-1.png'); background-repeat: no-repeat; background-position: bottom center; ">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="avatar avatar-sm avatar-label-danger">
                                        <i class="mdi mdi-buffer mt-1"></i>
                                    </div>
                                    <?php
                                    require_once 'config.php';

                                    $sql = "SELECT count(id_variasi) AS total FROM variasi_produk";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $total = $row['total'];
                                    } else {
                                        $total = 0;
                                    }


                                    ?>
                                    <div class="ms-3">
                                        <p class="text-danger mb-1">Total Produk</p>
                                        <h4 class="mb-0"><?= $total ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card bg-success-subtle"
                            style="background: url('assets/images/dashboard/dashboard-shape-2.png'); background-repeat: no-repeat; background-position: bottom center; ">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="avatar avatar-sm avatar-label-success">
                                        <i class="mdi mdi-cash-usd-outline mt-1"></i>
                                    </div>
                                    <?php

                                    $sql = "SELECT sum(total) AS total FROM penjualan ";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $total = $row['total'];
                                    } else {
                                        $total = 0;
                                    }


                                    ?>
                                    <div class="ms-3">
                                        <p class="text-success mb-1">Total Pendapatan</p>
                                        <h4 class="mb-0">Rp. <?= number_format($total, 0, ',', '.') ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card bg-info-subtle"
                            style="background: url('assets/images/dashboard/dashboard-shape-3.png'); background-repeat: no-repeat; background-position: bottom center; ">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="avatar avatar-sm avatar-label-info">
                                        <i class="mdi mdi-webhook mt-1"></i>
                                    </div>
                                    <?php

                                    $sql = "SELECT count(id_penjualan) AS total FROM penjualan WHERE status = 'Selesai'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $total = $row['total'];
                                    } else {
                                        $total = 0;
                                    }

                                    ?>
                                    <div class="ms-3">
                                        <p class="text-info mb-1">Pesanan Selesai</p>
                                        <h4 class="mb-0"><?= $total ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="sales_figures" data-colors='["--bs-info", "--bs-success"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>

</div>
<?php
$sqljual = "SELECT
                YEAR(tanggal_penjualan) AS year,
                MONTH(tanggal_penjualan) AS month,
                COUNT(*) AS sales_count
            FROM
	            v_laporanpenjualan
                WHERE YEAR(tanggal_penjualan) = YEAR(CURDATE())
            GROUP BY year, month";
$sqlbeli = "SELECT
                YEAR(tanggal_beli) AS year,
                MONTH(tanggal_beli) AS month,
                COUNT(*) AS buys_count
            FROM
	            v_laporanpembelian
                WHERE YEAR(tanggal_beli) = YEAR(CURDATE())
            GROUP BY year, month";

$sales_result = $conn->query($sqljual);
$sales_data = [];

if ($sales_result->num_rows > 0) {
    while ($row = $sales_result->fetch_assoc()) {
        $sales_data[] = $row;
    }
}

$buys_result = $conn->query($sqlbeli);
$buys_data = [];

if ($buys_result->num_rows > 0) {
    while ($row = $buys_result->fetch_assoc()) {
        $buys_data[] = $row;
    }
}

// Preparing data for ApexCharts
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
$sales_counts = array_fill(0, 12, 0);  // Initialize an array with 12 zeros
$buys_counts = array_fill(0, 12, 0);   // Initialize an array with 12 zeros

// Map buys data to corresponding months
foreach ($buys_data as $data) {
    $buys_counts[$data['month'] - 1] = $data['buys_count'];
}
// echo "<pre>";
// print_r($buys_counts);
// echo "</pre>";
// Map sales data to corresponding months
foreach ($sales_data as $data) {
    $sales_counts[$data['month'] - 1] = $data['sales_count'];
}
// echo "<pre>";
// print_r($sales_counts);
// echo "</pre>";



$conn->close();
?>
<script>
    function getChartColorsArray(e) {
        if (null !== document.getElementById(e)) {
            var t = document.getElementById(e).getAttribute("data-colors");
            if (t)
                return (t = JSON.parse(t)).map(function (e) {
                    var t = e.replace(" ", "");
                    if (-1 === t.indexOf(",")) {
                        var o = getComputedStyle(document.documentElement).getPropertyValue(
                            t
                        );
                        return o || t;
                    }
                    var r = e.split(",");
                    return 2 != r.length
                        ? t
                        : "rgba(" +
                        getComputedStyle(document.documentElement).getPropertyValue(
                            r[0]
                        ) +
                        "," +
                        r[1] +
                        ")";
                });
        }
    }
    const salesCounts = <?php echo json_encode($sales_counts); ?>;
    const buysCounts = <?php echo json_encode($buys_counts); ?>;
    const months = <?php echo json_encode($months); ?>;
    var chartColumnStacked100Colors = getChartColorsArray("sales_figures");
    chartColumnStacked100Colors &&
        ((options = {
            series: [
                {
                    name: "Penjualan",
                    data: salesCounts,
                },
                {
                    name: "Pembelian",
                    data: buysCounts,
                },
            ],
            dataLabels: { enabled: !1 },
            chart: {
                type: "bar",
                height: 400,
                stacked: !0,
                stackType: "100%",
                toolbar: { show: !1 },
                borderRadius: 30,
                animations: {
                    enabled: !0,
                    easing: "easeinout",
                    speed: 800,
                    animateGradually: { enabled: !0, delay: 150 },
                    dynamicAnimation: { enabled: !0, speed: 350 },
                },
            },
            stroke: { width: 3, colors: ["#fff"] },
            plotOptions: { bar: { borderRadius: 6, columnWidth: "20%" } },
            responsive: [
                {
                    breakpoint: 850,
                    options: {
                        chart: { height: 300 },
                        plotOptions: { bar: { columnWidth: "30%" } },
                    },
                },
                {
                    breakpoint: 620,
                    options: {
                        series: [
                            { data: [44, 55, 41, 67, 22, 43, 21, 49, 30] },
                            { data: [13, 23, 20, 8, 13, 27, 33, 12, 10] },
                        ],
                        plotOptions: { bar: { columnWidth: "40%" } },
                    },
                },
                {
                    breakpoint: 480,
                    options: { legend: { position: "bottom", offsetX: -10, offsetY: 0 } },
                },
                {
                    breakpoint: 350,
                    options: {
                        series: [
                            { data: [44, 55, 41, 67, 22, 43, 21] },
                            { data: [13, 23, 20, 8, 13, 27, 33] },
                        ],
                        plotOptions: { bar: { columnWidth: "50%" } },
                    },
                },
            ],
            xaxis: {
                categories: months,
            },
            fill: { opacity: 1 },
            legend: { show: !1 },
            colors: chartColumnStacked100Colors,
        }),
            (chart = new ApexCharts(
                document.querySelector("#sales_figures"),
                options
            )).render());
</script>