<script src="https://cdn.tiny.cloud/1/cp09tuj1c1qcxwqilunpue1g7i1c0lgxur46my743r05ukmn/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
<form id="tambah-produk" enctype="multipart/form-data">
    <div class="d-grid gap-3">
        <div>
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control form-control-lg" name="nama_produk" id="nama_produk"
                placeholder="Nama Produk">
        </div>
        <div>
            <label class="form-label" for="id_merk">Merk Produk</label>
            <select class="form-select form-select-lg" name="id_merk" id="id_merk">
                <?php
                include "../../config.php";
                $sql = "SELECT * FROM merk";
                $result = mysqli_query($conn, $sql);
                while ($item = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?= $item['id_merk'] ?>"><?= $item['nama_merk'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" class="form-control form-control-lg" name="harga_beli" id="harga_beli">
            </div>
            <div class="col-md-6">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" class="form-control form-control-lg" name="harga_jual" id="harga_jual">
            </div>
        </div>
        <div>
            <label for="detail" class="form-label">Deskripsi</label>
            <textarea name="detail" id="detail" rows="3"></textarea>
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
            url: "proses.php?aksi=tambah-produk",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Produk Berhasil Ditambah');

                } else {
                    alertify.error('Produk Gagal Ditambah');

                }
            }
        });
    });
</script>