<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Laporan Penjualan</h4>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pilih Bulan Laporan</h4>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <form action="" method="GET">
                        <input type="hidden" value="laporan-penjualan" name="page">

                        <div class="form-group">
                            <label class="form-label" for="bulan">Bulan</label>
                            <select name="bulan" id="bulan" class="form-select form-select=lg">
                                <option value="">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Cari</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- end page title -->
<?php
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
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Laporan Penjualan <?php echo $titlebulan ?></h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Stok Terjual</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        if (isset($_GET['bulan'])) {
                            $bulan = $_GET['bulan'];
                        } else {
                            $bulan = date('m');
                        }


                        $sql = "SELECT
                            SUM(harga_jual) AS total_jual, 
                            SUM(jumlah) AS stok_jual, 
                            nama_produk, 
                            ukuran, 
                            warna
                        FROM
                            v_laporanpenjualan
                            WHERE month(tanggal_penjualan) = '$bulan'
                        GROUP BY
                            id_variasi";
                        $result = $conn->query($sql);
                        $no = 0;
                        while ($row = $result->fetch_assoc()) {
                            $no++;
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nama_produk'] . ' - ' . $row['ukuran'] . ' - ' . $row['warna'] ?></td>
                                <td><?= $row['stok_jual'] ?> PCS</td>
                                <td>Rp <?= number_format($row['total_jual'], 0, ',', '.') ?></td>




                            </tr>
                            <?php
                        }
                        $conn->close() ?>
                    </tbody>
                </table>

                <a target="_blank" href="page/penjualan/cetak-penjualan.php?bulan=<?= $bulan ?>"
                    class="btn btn-primary">Cetak
                    Laporan</a>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>