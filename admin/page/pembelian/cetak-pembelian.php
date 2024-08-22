<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Custom styles for this template -->
    <link href="../../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />


</head>

<body>
    <?php
    include '../../config.php';
    function bulan($inputbulan)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        return $bulan[(int) $inputbulan[1]];
    }
    if (isset($_GET['bulan'])) {
        $titlebulan = bulan($_GET['bulan']);
    } else {
        $titlebulan = bulan(date('m'));

    }
    ?>
    <div class="container-fluid">

        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>LAPORAN PEMBELIAN</h3>
                    <h3><b>TOKO MARDIYAN</b></h3>
                </div>
            </div>
        </div>
        <hr>
        <div class="">
            <!--rows -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="mb-3 text-center"><b>Laporan Pembelian </b> <br> Bulan : <?php echo $titlebulan ?>
                    </h4>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Stok Terjual</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['bulan'])) {
                                $bulan = $_GET['bulan'];
                            } else {
                                $bulan = date('m');
                            }


                            $sql = "SELECT
                            SUM(harga_beli) AS total_beli, 
                            SUM(jumlah) AS stok_beli, 
                            nama_produk, 
                            ukuran, 
                            warna
                        FROM
                            v_laporanpembelian
                            WHERE month(tanggal_beli) = '$bulan'
                        GROUP BY
                            id_variasi";
                            $result = $conn->query($sql);
                            $no = 0;
                            $total = 0;
                            while ($row = $result->fetch_assoc()) {
                                $no++;
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['nama_produk'] . ' - ' . $row['ukuran'] . ' - ' . $row['warna'] ?></td>
                                    <td><?= $row['stok_beli'] ?> PCS</td>
                                    <td>Rp <?= number_format($row['total_beli'], 0, ',', '.') ?></td>




                                </tr>
                                <?php
                                $total += $row['total_beli'];
                            }
                            $conn->close() ?>
                            <tr>
                                <td colspan="3" class="text-center">Total</td>
                                <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>

        window.print();
        window.onafterprint = window.close;
    </script>
</body>

</html>