<form id="tambah-pengguna" enctype="multipart/form-data">
    <div class="d-grid gap-3">
        <div>
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control form-control-lg" name="username" id="username"
                placeholder="Username">
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control form-control-lg" name="password" id="password"
                placeholder="Password">
        </div>
        <div>
            <label for="level" class="form-label">Level</label>
            <select class="form-select form-select-lg" name="level" id="level">
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
                <option value="pelanggan">Pelanggan</option>

            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg mt-3">SImpan</button>
</form>
<script>
    $("#tambah-pengguna").submit(function (e) {
        var formData = new FormData(this);

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "proses.php?aksi=tambah-pengguna",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Pengguna Berhasil Ditambah');

                } else {
                    alertify.error('Pengguna Gagal Ditambah');

                }
            }
        });
    });
</script>