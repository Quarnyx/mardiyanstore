<table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Pesanan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pesan</th>
            <th>Status</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../../config.php";


        $sql = "SELECT * FROM v_penjualandepan";
        $result = $conn->query($sql);
        $no = 0;
        while ($row = $result->fetch_assoc()) {
            $no++;
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row['kode_penjualan'] ?></td>
                <td><?= $row['nama_pelanggan'] ?></td>
                <td><?= $row['tanggal_penjualan'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>

                <td>
                    <a href="?page=detail-penjualan&kode=<?= $row['kode_penjualan'] ?>" class="btn btn-info"
                        title="Detail">Detail</a>
                    <button data-kode="<?= $row['kode_penjualan'] ?>" id="delete" class="btn btn-danger">Batalkan</button>
                </td>


            </tr>
            <?php
        }
        $conn->close() ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();

        $('#datatable').on('click', '#delete', function () {
            const id = $(this).data('kode');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data ?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'proses.php?aksi=hapus-penjualan',
                    data: 'kode=' + id,
                    success: function (data) {
                        loadTable();
                        // alertify pesan sukses
                        alertify.success('Pengguna Berhasil Dihapus');
                    },
                    error: function (data) {
                        alertify.error(data);
                    }
                })
            }, function () {
                alertify.error('Hapus dibatalkan');
            })
        });
    });
</script>