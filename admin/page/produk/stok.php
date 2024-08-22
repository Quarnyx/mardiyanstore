<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Stok Barang</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Stok Barang</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM v_stok";
                        $result = $conn->query($sql);
                        $no = 0;
                        while ($row = $result->fetch_assoc()) {
                            $no++;
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nama_produk'] . ' - ' . $row['ukuran'] . ' - ' . $row['warna'] ?></td>
                                <td><?= $row['stok'] ?> PCS</td>




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
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>