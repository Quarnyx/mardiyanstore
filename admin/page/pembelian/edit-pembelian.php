<?php
include "../../config.php";
$sql = "SELECT * FROM v_pembelian WHERE id_pembelian = '$_POST[id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>
<form id="form-edit" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id_pembelian'] ?>">
    <div class="d-grid gap-3">
        <div class="row">
            <div class="col-md-12">
                <label for="produk" class="form-label">Produk</label>
                <select class="form-select form-select-lg" name="id_variasi" id="id_variasi">
                    <?php
                    include "../../config.php";
                    $sql = "SELECT * FROM v_variasi";
                    $result = mysqli_query($conn, $sql);
                    while ($item = mysqli_fetch_array($result)) {
                        ?>
                        <option data-harga="<?= $item['harga_beli'] ?>" value="<?= $item['id_variasi'] ?>" <?php if ($item['id_variasi'] == $row['id_variasi'])
                                echo "selected" ?>>
                            <?= $item['nama_produk'] . " - " . $item['ukuran'] . " - " . $item['warna'] ?>
                        </option>
                        <?php
                    }

                    ?>

                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" class="form-control form-control-lg" id="harga_beli" name="harga_beli" readonly
                    value="<?= $row['harga_beli'] ?>">
            </div>
            <div class="col-md-6">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control form-control-lg" id="jumlah" name="jumlah" required
                    value="<?= $row['jumlah'] ?>">
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                <input type="date" class="form-control form-control-lg" id="tanggal_pembelian" name="tanggal_beli"
                    required value="<?= $row['tanggal_beli'] ?>">

            </div>

        </div>
        <button type="submit" class="btn btn-primary btn-lg mt-3">SImpan</button>
</form>
<script>
    $("select").select2({
        dropdownParent: $('.modal .modal-content'),
    });

    $("#id_variasi").change(function () {
        const id = $(this).val();
        const harga = $(this).find(':selected').data('harga');
        $("#harga_beli").val(harga);
    });
    $("#form-edit").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'proses.php?aksi=edit-pembelian',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Pembelian Berhasil Diedit');

                } else {
                    alertify.error('Pembelian Gagal Diedit');

                }

            },
            error: function (data) {
                alertify.error(data);
            }
        });
    });
</script>