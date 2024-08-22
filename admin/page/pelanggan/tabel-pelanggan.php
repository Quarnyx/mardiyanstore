<table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Kode Pos</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../../config.php";


        $sql = "SELECT * FROM pelanggan";
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


                <td>
                    <button data-id="<?= $row['id_akun'] ?>" data-name="<?= $row['nama_pelanggan'] ?>" id="delete"
                        class="btn btn-danger">Delete</button>
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
            const id = $(this).data('id');
            const name = $(this).data('name');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data ' + name + '?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'proses.php?aksi=hapus-pelanggan',
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