<?php
include "config.php";
$sql = "SELECT * FROM produk WHERE id_produk = '$_GET[id]'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Variasi Produk <?php echo $row['nama_produk'] ?></h4>
        </div>
        <button class="btn btn-primary" id="tambah">Tambah Variasi</button>

    </div>
</div>
<!-- end page title -->

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Variasi Produk</h4>
            </div>
            <div class="card-body">


            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<script>
    function loadTable() {
        $('.card-body').load('page/produk/tabel-variasi-produk.php', {
            id: <?php echo $_GET['id'] ?>
        });
    }
    $(document).ready(function () {

        loadTable();

        $('#tambah').click(function () {
            $('.modal').modal('show');
            $('.modal-title').text('Tambah Variasi Produk');
            $('.modal-body').load('page/produk/tambah-variasi-produk.php', {
                id: <?php echo $_GET['id'] ?>
            });
        });
    });
</script>