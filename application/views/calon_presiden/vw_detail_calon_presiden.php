<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Calon Presiden
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?= $calon_presiden['nama_lengkap']; ?></h2>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $calon_presiden['asal']; ?></h6>
                </div>
                <div class="row">
                    <div class="col-md-4">NIK</div>
                    <div class="col-md-2">:</div>
                    <div class="col-md-6"><?= $calon_presiden['nik']; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-4">Partai Pendukung</div>
                    <div class="col-md-2">:</div>
                    <div class="col-md-6"><?= $calon_presiden['partai_pendukung']; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-4">Riwayat Pekerjaan</div>
                    <div class="col-md-2">:</div>
                    <div class="col-md-6"><?= $calon_presiden['riwayat_pekerjaan']; ?></div>
                </div>
            <div class="card-footer justify-content-center">
                <a href="<?= base_url('index.php/calon_presiden')?>" class="btn 
                btn-danger">Tutup</a>
            </div>
        </div>
    </div>
</div>