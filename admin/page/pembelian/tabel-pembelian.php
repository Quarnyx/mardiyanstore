<table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Tanggal Pembelian</th>
            <th>Jumlah</th>
            <th>Harga Beli</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../../config.php";


        $sql = "SELECT * FROM v_pembelian";
        $result = $conn->query($sql);
        $no = 0;
        while ($row = $result->fetch_assoc()) {
            $no++;
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row['nama_produk'] . ' - ' . $row['ukuran'] . ' - ' . $row['warna'] ?></td>
                <td><?= $row['tanggal_beli'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.') ?></td>
                <td>Rp <?= number_format($row['harga_beli'] * $row['jumlah'], 0, ',', '.') ?></td>

                <td>
                    <button data-id="<?= $row['id_pembelian'] ?>" id="edit" class="btn btn-primary">Edit</button>
                    <button data-id="<?= $row['id_pembelian'] ?>" id="delete" class="btn btn-danger">Delete</button>
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
        $('#datatable').on('click', '#edit', function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            $.ajax({
                type: 'POST',
                url: 'page/pembelian/edit-pembelian.php',
                data: 'id=' + id + '&name=' + name,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Edit Data ' + name);
                    $('.modal .modal-body').html(data);
                }
            })
        });

        $('#datatable').on('click', '#delete', function () {
            const id = $(this).data('id');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data ?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'proses.php?aksi=hapus-pembelian',
                    data: 'id=' + id,
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