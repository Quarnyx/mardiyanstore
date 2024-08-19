<?php
include "../../config.php";
$id = $_POST['id'];
$sql = "SELECT * FROM variasi_produk WHERE id_variasi = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="id_produk" value="<?= $row['id_produk'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-6">
                <label for="warna" class="form-label">Warna</label>
                <input type="text" class="form-control form-control-lg" name="warna" id="warna"
                    value="<?= $row['warna'] ?>">
            </div>
            <div class="col-md-6">
                <label for="ukuran" class="form-label">Ukuran</label>
                <input type="text" class="form-control form-control-lg" name="ukuran" id="ukuran"
                    value="<?= $row['ukuran'] ?>">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg mt-3">SImpan</button>
</form>
<script>
    $("#form-edit").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'proses.php?aksi=edit-variasi-produk',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".modal").modal('hide');
                loadTable();
                alertify.success('Berhasil Diedit');

            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>