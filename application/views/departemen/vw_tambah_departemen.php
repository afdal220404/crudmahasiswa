<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul ?></h1>
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header justify-content-center">
                Form Tambah Data Departemen
            </div>

            <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_departemen">Nama Departemen</label>
                                    <input type="text" value="<?= set_value('nama_departemen'); ?>" name="nama_departemen" class="form-control"
                                        id="nama" placeholder="Nama Departmen"><br>
                                    <?= form_error('nama_departemen', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_departemen">Lokasi departemen</label>
                                    <input type="text" value="<?= set_value('lokasi_departemen'); ?>" name="lokasi_departemen"
                                        class="form-control" id="ruangan" placeholder="Ruangan"><br>
                                    <?= form_error('lokasi_departemen', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                </div>
                                <a href="<?= base_url('departemen/') ?>" class="btn btn-danger">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah
                                    Departemen</button>
                            </form>
            </div>
        </div>
    </div>
</div>    