<?php
include "../../config.php";
$sql = "SELECT * FROM pengguna WHERE id_akun = '$_POST[id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_akun'] ?>">
    <div class="d-grid gap-3">
        <div>
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username"
                value="<?= $row['username'] ?>">
        </div>
        <div>
            <label for="level" class="form-label">Level</label>
            <select class="form-select form-select-lg" name="level" id="level">
                <option value="admin" <?php if ($row['level'] == 'admin')
                    echo 'selected' ?>>Admin</option>
                    <option value="kasir" <?php if ($row['level'] == 'kasir')
                    echo 'selected' ?>>Kasir</option>
                    <option value="pelanggan" <?php if ($row['level'] == 'pelanggan')
                    echo 'selected' ?>>Pelanggan</option>
                </select>
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
                url: 'proses.php?aksi=edit-pengguna',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $(".modal").modal('hide');
                    loadTable();
                    alertify.success('Pengguna Berhasil Diedit');

                },
                error: function (data) {
                    alertify.error(data);
                }
            });
        });
    </script>