<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data Produk</h4>
        </div>
        <button class="btn btn-primary" id="tambah">Tambah Produk</button>

    </div>
</div>
<!-- end page title -->

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Produk</h4>
            </div>
            <div class="card-body">


            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<script>
    function loadTable() {
        $('.card-body').load('page/produk/tabel-produk.php');
    }
    $(document).ready(function () {

        loadTable();

        $('#tambah').click(function () {
            $('.modal').modal('show');
            $('.modal-title').text('Tambah Produk');
            $('.modal-body').load('page/produk/tambah-produk.php');
        });
    });
</script>