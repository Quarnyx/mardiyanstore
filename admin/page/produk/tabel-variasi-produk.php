<table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Warna</th>
            <th>Ukuran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../../config.php";


        $sql = "SELECT * FROM variasi_produk WHERE id_produk = '$_POST[id]'";
        $result = $conn->query($sql);
        $no = 0;
        while ($row = $result->fetch_assoc()) {
            $no++;
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row['warna'] ?></td>
                <td><?= $row['ukuran'] ?></td>
                <td>
                    <button data-id="<?= $row['id_variasi'] ?>" id="edit" class="btn btn-primary">Edit</button>
                    <button data-id="<?= $row['id_variasi'] ?>" id="delete" class="btn btn-danger">Delete</button>
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
            $.ajax({
                type: 'POST',
                url: 'page/produk/edit-variasi-produk.php',
                data: 'id=' + id,
                success: function (data) {
                    $('.modal').modal('show');
                    $('.modal-title').html('Edit Data');
                    $('.modal .modal-body').html(data);
                }
            })
        });
        $('#datatable').on('click', '#delete', function () {
            const id = $(this).data('id');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'proses.php?aksi=hapus-variasi-produk',
                    data: 'id=' + id,
                    success: function (data) {
                        loadTable();
                        // alertify pesan sukses
                        alertify.success('produk Berhasil Dihapus');
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