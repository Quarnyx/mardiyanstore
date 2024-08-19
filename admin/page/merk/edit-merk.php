<?php
include "../../config.php";
$sql = "SELECT * FROM merk WHERE id_merk = '$_POST[id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_merk'] ?>">
    <div class="d-grid gap-3">
        <div>
            <label for="nama_merk" class="form-label">Nama Merk</label>
            <input type="text" class="form-control form-control-lg" name="nama_merk" id="nama_merk"
                placeholder="nama_merk" value="<?= $row['nama_merk'] ?>">
        </div>

        <button type="submit" class="btn btn-primary btn-lg mt-3">SImpan</button>
</form>
<script>
    $("#form-edit").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'proses.php?aksi=edit-merk',
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