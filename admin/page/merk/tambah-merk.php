<form id="tambah-merk" enctype="multipart/form-data">
    <div class="d-grid gap-3">
        <div>
            <label for="nama_merk" class="form-label">Nama Merk</label>
            <input type="text" class="form-control form-control-lg" name="nama_merk" id="nama_merk"
                placeholder="Nama Merk">
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg mt-3">SImpan</button>
</form>
<script>
    $("#tambah-merk").submit(function (e) {
        var formData = new FormData(this);

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "proses.php?aksi=tambah-merk",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Merk Berhasil Ditambah');

                } else {
                    alertify.error('Merk Gagal Ditambah');

                }
            }
        });
    });
</script>