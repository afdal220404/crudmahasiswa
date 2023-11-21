<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail departemen
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?= $departemen['nama_departemen']; ?></h2>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $departemen['lokasi_departemen']; ?></h6>
                </div>
            <div class="card-footer justify-content-center">
                <a href="<?= base_url('index.php/departemen')?>" class="btn 
                btn-danger">Tutup</a>
            </div>
        </div>
    </div>
</div>