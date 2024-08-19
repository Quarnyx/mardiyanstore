<form id="tambah-pembelian" enctype="multipart/form-data">
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
                        <option data-harga="<?= $item['harga_beli'] ?>" value="<?= $item['id_variasi'] ?>">
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
                <input type="number" class="form-control form-control-lg" id="harga_beli" name="harga_beli" readonly>
            </div>
            <div class="col-md-6">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control form-control-lg" id="jumlah" name="jumlah" required>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                <input type="date" class="form-control form-control-lg" id="tanggal_pembelian" name="tanggal_beli"
                    required>

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
    $("#tambah-pembelian").submit(function (e) {
        var formData = new FormData(this);

        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "proses.php?aksi=tambah-pembelian",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == "ok") {
                    loadTable();
                    $('.modal').modal('hide');
                    alertify.success('Pembelian Berhasil Ditambah');

                } else {
                    alertify.error('Pembelian Gagal Ditambah');

                }
            }
        });
    });
</script>