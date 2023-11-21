<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-header justify-content-center"> 
                    Form Tambah Data Karyawan
                </div>
                <div class="card-body">
                <form action=" " method="POST">
                                <div class="form-group">
                                    <label for="nama_karyawan">nama karyawan</label>
                                    <input type="text" value="<?= set_value('nama_karyawan');?>" name="nama_karyawan" class="form-control" id="nama_karyawan" 
                                    placeholder="nama karyawan"><?= form_error('nama_karyawan','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" value="<?= set_value('jenis_kelamin');?>" id="jenis_kelamin" class="form-control">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_karyawan">alamat karyawan</label>
                                    <input type="text" value="<?= set_value('alamat_karyawan');?>" name="alamat_karyawan" class="form-control" id="alamat_karyawan"
                                        placeholder="alamat_karyawan"><?= form_error('alamat_karyawan','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="departemen">Departemen</label>
                                    <input type="text" value="<?= set_value('departemen');?>" name="departemen" class="form-control" id="departemen"
                                        placeholder="Asal Sekolah"><?= form_error('departemen','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" value="<?= set_value('jabatan');?>" name="jabatan" class="form-control" id="jabatan" 
                                    placeholder="jabatan"><?= form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <a href="<?= base_url('karyawan') ?>" class="btn btn-danger">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah
                                    Karyawan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>