<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul ?></h1>
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header justify-content-center">
                Form Tambah Data Prodi
            </div>

            <div class="card-body">
            <form action=" " method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $prodi['id']; ?>">
                                <div class="form-group">
                                    <label for="namak">Nama Prodi</label>
                                    <input type="text" value="<?= $prodi['nama']; ?>" name="nama" class="form-control"
                                        id="namaK" placeholder="Nama Prodi"><br>
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="ruangan">Ruangan</label>
                                    <input type="text" value="<?= $prodi['ruangan']; ?>" name="ruangan"
                                        class="form-control" id="ruangan" placeholder="Ruangan"><br>
                                    <?= form_error('ruangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" value="<?= $prodi['jurusan']; ?>" name="jurusan"
                                        class="form-control" id="jurusan" placeholder="Jurusan"><br>
                                    <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="akreditasi">Akreditasi</label>
                                    <input type="text" value="<?= $prodi['akreditasi']; ?>" name="akreditasi"
                                        class="form-control" id="akreditasi" placeholder="Akreditasi"><br>
                                    <?= form_error('akreditasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kaprodi">Nama Kaprodi</label>
                                    <input type="text" value="<?= $prodi['nama_kaprodi']; ?>" name="nama_kaprodi"
                                        class="form-control" id="nama_kaprodi" placeholder="Nama Kaprodi"><br>
                                    <?= form_error('nama_kaprodi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_berdiri">Tahun Berdiri</label>
                                    <input type="text" value="<?= $prodi['tahun_berdiri']; ?>" name="tahun_berdiri"
                                        class="form-control" id="tahun_berdiri" placeholder="Tahun Berdiri"><br>
                                    <?= form_error('tahun_berdiri', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="output_lulusan">Output Lulusan</label>
                                    <input type="text" value="<?= $prodi['output_lulusan']; ?>" name="output_lulusan"
                                        class="form-control" id="output_lulusan" placeholder="Output Lulusan"><br>
                                    <?= form_error('output_lulusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <img src="<?= base_url('assets/prodi/') . $prodi['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" name="gambar" id="gambar">
                                        <label for="gambar" class="custom-file-label">Choose File</label>
                                        <?= form_error("gambar", '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <a href="<?= base_url('prodi') ?>" class="btn btn-danger">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah
                                    prodi</button>
                            </form>
            </div>
        </div>
    </div>
</div>    