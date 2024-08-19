<form id="tambah-produk" enctype="multipart/form-data">
    <input type="hidden" name="id_produk" value="<?= $_POST['id'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-6">
                <label for="warna" class="form-label">Warna</label>
                <input type="text" class="form-control form-control-lg" name="warna" id="warna">
            </div>
            <div class="col-md-6">
                <label for="ukuran" class="form-label">Ukuran</label>
                <input type="text" class="form-control form-control-lg" name="ukuran" id="ukuran">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg mt-3">SImpan</button>
</form>
<script>
    $("#tambah-produk").submit(function (e) {
        var formData = new FormData(this);

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "proses.php?aksi=tambah-variasi-produk",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Variasi Berhasil Ditambah');

                } else {
                    alertify.error('Variasi Gagal Ditambah');

                }
            }
        });
    });
</script>