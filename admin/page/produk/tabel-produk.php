<table id="datatable" class="table table-hover table-bordered table-striped dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Merk</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../../config.php";


        $sql = "SELECT * FROM v_produk";
        $result = $conn->query($sql);
        $no = 0;
        while ($row = $result->fetch_assoc()) {
            $no++;
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row['nama_produk'] ?></td>
                <td><?= $row['nama_merk'] ?></td>
                <td><?= "Rp " . number_format($row['harga_beli'], 0, ',', '.') ?></td>
                <td><?= "Rp " . number_format($row['harga_jual'], 0, ',', '.') ?></td>
                <td>
                    <button data-id="<?= $row['id_produk'] ?>" data-name="<?= $row['nama_produk'] ?>" id="edit"
                        class="btn btn-primary">Edit</button>
                    <button data-id="<?= $row['id_produk'] ?>" data-name="<?= $row['nama_produk'] ?>" id="delete"
                        class="btn btn-danger">Delete</button>
                    <a href="?page=variasi-produk&id=<?= $row['id_produk'] ?>" class="btn btn-success">Variasi
                        Produk</a>
                    <a href="?page=gambar-produk&id=<?= $row['id_produk'] ?>" class="btn btn-info">Gambar</a>
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
                url: 'page/produk/edit-produk.php',
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
            const name = $(this).data('name');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data ' + name + '?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'proses.php?aksi=hapus-produk',
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