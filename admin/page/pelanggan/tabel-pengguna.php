<table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../../config.php";


        $sql = "SELECT * FROM pengguna";
        $result = $conn->query($sql);
        $no = 0;
        while ($row = $result->fetch_assoc()) {
            $no++;
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['level'] ?></td>
                <td>
                    <button data-id="<?= $row['id_akun'] ?>" data-name="<?= $row['username'] ?>" id="edit"
                        class="btn btn-primary">Edit</button>
                    <button data-id="<?= $row['id_akun'] ?>" data-name="<?= $row['username'] ?>" id="delete"
                        class="btn btn-danger">Delete</button>
                    <button data-id="<?= $row['id_akun'] ?>" data-name="<?= $row['username'] ?>" id="edit-password"
                        class="btn btn-success">Ganti Password</button>
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
                url: 'page/pengguna/edit-pengguna.php',
                data: 'id=' + id + '&name=' + name,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Edit Data ' + name);
                    $('.modal .modal-body').html(data);
                }
            })
        });
        $('#datatable').on('click', '#edit-password', function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            alertify.prompt('Ganti Password ' + name, 'Masukkan Password Baru', '', function (evt, value) {
                $.ajax({
                    type: 'POST',
                    url: 'proses.php?aksi=ganti-password',
                    data: 'id=' + id + '&name=' + name + '&password=' + value,
                    success: function (data) {
                        alertify.success('Password Berhasil Diubah');
                    },
                    error: function (data) {
                        alertify.error(data);
                    }
                })
            }, function () {
                alertify.error('Ganti password dibatalkan');
            })
        });
        $('#datatable').on('click', '#delete', function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data ' + name + '?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'proses.php?aksi=hapus-pengguna',
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