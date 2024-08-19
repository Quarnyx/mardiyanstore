<?php
include "config.php";
$sql = "SELECT * FROM produk WHERE id_produk = '$_GET[id]'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Gambar Produk <?php echo $row['nama_produk'] ?></h4>
        </div>

        <div class="card">
            <div class="card-header card-header-bordered">
                <h3 class="card-title">Tambah Gambar</h3>
            </div>
            <div class="card-body">
                <form id="form-gambar" enctype="multipart/form-data">
                    <input type="hidden" name="id_produk" value="<?php echo $row['id_produk'] ?>">
                    <div class="d-grid gap-3">
                        <div class="input-group">
                            <input type="file" class="form-control form-control-lg" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="gambar">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Tambah
                                Gambar</button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg mt-3">SImpan</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- end page title -->

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Variasi Produk</h4>
            </div>
            <div class="card-body" id="daftar-gambar">


            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<script>
    function loadTable() {
        $('#daftar-gambar').load('page/produk/daftar-gambar-produk.php', {
            id: <?php echo $_GET['id'] ?>
        });
    }
    $(document).ready(function () {

        loadTable();

        $('#form-gambar').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: 'proses.php?aksi=tambah-gambar-produk',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
                    loadTable();
                    // alertify pesan sukses
                    alertify.success('Gambar Berhasil Ditambah');
                },
                error: function (data) {
                    alertify.error(data);
                }
            });
        });

    });
</script>