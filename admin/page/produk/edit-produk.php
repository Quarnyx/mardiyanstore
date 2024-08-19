<script src="https://cdn.tiny.cloud/1/cp09tuj1c1qcxwqilunpue1g7i1c0lgxur46my743r05ukmn/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
<?php
include "../../config.php";
$id = $_POST['id'];
$sql = "SELECT * FROM produk WHERE id_produk = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="d-grid gap-3">
        <div>
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control form-control-lg" name="nama_produk" id="nama_produk"
                placeholder="Nama Produk" value="<?= $row['nama_produk'] ?>">
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
                    <option value="<?= $item['id_merk'] ?>" <?php if ($item['id_merk'] == $row['id_merk'])
                          echo "selected" ?>>
                        <?= $item['nama_merk'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" class="form-control form-control-lg" name="harga_beli" id="harga_beli"
                    value="<?= $row['harga_beli'] ?>">
            </div>
            <div class="col-md-6">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" class="form-control form-control-lg" name="harga_jual" id="harga_jual"
                    value="<?= $row['harga_jual'] ?>">
            </div>
        </div>
        <div>
            <label for=" detail" class="form-label">Deskripsi</label>
            <textarea name="detail" id="detail" rows="3"><?= $row['detail'] ?></textarea>
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
            url: 'proses.php?aksi=edit-produk',
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