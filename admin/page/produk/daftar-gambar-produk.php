<div class="row">
    <?php
    include "../../config.php";
    $sql = "SELECT * FROM gambar_produk WHERE id_produk = '$_POST[id]'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="card border col-md-3 m-1">
            <div class="card-header">
                <h3 class="card-title">Gambar</h3>
            </div>
            <div class="card-body">
                <img src="assets/images/produk/<?= $row['gambar'] ?>" alt="center" class="img-fluid">
            </div>
            <div class="card-footer card-footer-bordered text-center">
                <button class="btn btn-danger" id="hapus-gambar" data-id="<?= $row['id_gambar'] ?>"><i
                        class="fa fa-trash"></i>
                    Hapus</button>
            </div>
        </div>

        <?php
    }
    ?>
</div>
<script>
    $(document).ready(function () {
        $('#hapus-gambar').on('click', function () {
            var id = $(this).data('id');
            alertify.confirm('Hapus', 'Apakah anda yakin ingin menghapus data?', function () {
                $.ajax({
                    type: 'POST',
                    url: 'proses.php?aksi=hapus-gambar-produk',
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
    })

</script>