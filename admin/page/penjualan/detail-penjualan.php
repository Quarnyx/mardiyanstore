<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data Pesanan <?php echo $_GET['kode'] ?></h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Pesanan</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";


                        $sql = "SELECT * FROM v_pesanan WHERE kode_penjualan = '" . $_GET['kode'] . "'";
                        $result = $conn->query($sql);
                        $no = 0;
                        while ($row = $result->fetch_assoc()) {
                            $no++;
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nama_produk'] . ' - ' . $row['ukuran'] . ' - ' . $row['warna'] ?></td>
                                <td>Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?></td>
                                <td><?= $row['jumlah'] ?></td>
                                <td>Rp <?= number_format($row['harga_jual'] * $row['jumlah'], 0, ',', '.') ?></td>
                            </tr>
                            <?php
                        }
                        $conn->close() ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<?php
include "config.php";
$sql = "SELECT * FROM v_penjualandepan WHERE kode_penjualan = '" . $_GET['kode'] . "'";
$result = $conn->query($sql);
$no = 0;
$row = $result->fetch_assoc();
?>
<div class="row mt-3">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pembayaran dan Pengiriman</h4>
            </div>
            <div class="card-body">
                <div class="form-group mt-1">
                    <label for="total">Total</label>
                    <input type="text" class="form-control form-control-lg" id="total" name="total"
                        value="Rp <?= number_format($row['total'], 0, ',', '.') ?>" readonly>
                </div>

                <div class="form-group mt-1">
                    <label for="bayar">Metode Pembayaran</label>
                    <input type="text" class="form-control form-control-lg" id="bayar" name="bayar"
                        value="<?= $row['pembayaran'] ?>" readonly>
                </div>

                <div class="form-group mt-1">
                    <label for="kirim">Metode Pengiriman</label>
                    <input type="text" class="form-control form-control-lg" id="kirim" name="kirim"
                        value="<?= $row['pengiriman'] ?>" readonly>
                </div>
                <form action="proses.php?aksi=update-status" method="POST">

                    <div class="row">
                        <input type="hidden" name="kode_penjualan" value="<?= $row['kode_penjualan'] ?>">
                        <div class="col-8 mt-1">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select form-select-lg" name="status">
                                    <option value="Ditahan" <?= $row['status'] == 'Ditahan' ? 'selected' : '' ?>>Ditahan
                                    </option>
                                    <option value="Dikirim" <?= $row['status'] == 'Dikirim' ? 'selected' : '' ?>>Dikirim
                                    </option>
                                    <option value="Selesai" <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 align-content-end">
                            <button type="submit" class="btn btn-primary btn-lg" id="simpan">Ubah Status</button>
                        </div>
                    </div>
                </form>
                <form action="proses.php?aksi=update-resi" method="POST">

                    <div class="row">
                        <input type="hidden" name="kode_penjualan" value="<?= $row['kode_penjualan'] ?>">
                        <div class="col-8 mt-1">
                            <div class="form-group">
                                <label for="resi">Resi</label>
                                <input type="text" class="form-control form-control-lg" id="resi" name="resi"
                                    value="<?= $row['no_resi'] ?>" placeholder="-">
                            </div>
                        </div>
                        <div class="col-4 align-content-end">
                            <button type="submit" class="btn btn-primary btn-lg" id="simpan">Ubah Resi</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Pelanggan</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Kode Pos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM v_penjualandepan WHERE kode_penjualan = '" . $_GET['kode'] . "'";
                        $result = $conn->query($sql);
                        $no = 0;
                        while ($row = $result->fetch_assoc()) {
                            $no++;
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nama_pelanggan'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><?= $row['no_hp'] ?></td>
                                <td><?= $row['kode_pos'] ?></td>
                            </tr>
                            <?php
                        }
                        $conn->close() ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>