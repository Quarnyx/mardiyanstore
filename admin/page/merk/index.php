<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data Merk</h4>
        </div>
        <button class="btn btn-primary" id="tambah">Tambah Merk</button>

    </div>
</div>
<!-- end page title -->

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Merk</h4>
            </div>
            <div class="card-body">


            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<script>
    function loadTable() {
        $('.card-body').load('page/merk/tabel-merk.php');
    }
    $(document).ready(function () {

        loadTable();

        $('#tambah').click(function () {
            $('.modal').modal('show');
            $('.modal-title').text('Tambah Merk');
            $('.modal-body').load('page/merk/tambah-merk.php');
        });
    });
</script>