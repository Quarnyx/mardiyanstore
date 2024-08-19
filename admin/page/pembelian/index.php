<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data Pengguna</h4>
        </div>
        <button class="btn btn-primary" id="tambah">Tambah Akun</button>

    </div>
</div>
<!-- end page title -->

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Pengguna</h4>
            </div>
            <div class="card-body">


            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<script>
    function loadTable() {
        $('.card-body').load('page/pengguna/tabel-pengguna.php');
    }
    $(document).ready(function () {

        loadTable();

        $('#tambah').click(function () {
            $('.modal').modal('show');
            $('.modal-title').text('Tambah Akun');
            $('.modal-body').load('page/pengguna/tambah-pengguna.php');
        });
    });
</script>