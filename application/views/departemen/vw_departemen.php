
<!-- Page content-->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul ?></h1>
    <div class="col-md-6"><a href="<?= base_url()?>departemen/tambah" class="btn btn-info mb-2">Tambah
        departemen</a></div>
    <div class="col-md-12">
        <table class="table">
        <thead>
        <tr>
         <td>No</td>
         <td>Nama Departemen</td>
         <td>Lokasi</td>
         <td>aksi</td>
        </tr>
                    </thead> 
                    <tbody>
                   <?php $i = 1 ?>
                   <?php foreach ($departemen as $us): ?>
                   <tr>
                    <td>
                     <?= $i; ?>.
                    </td>
                   <td><?= $us['nama_departemen']; ?>.</td>
                   <td><?= $us['lokasi_departemen']; ?>.</td>
                         <td>
                       <a href="<?= base_url('departemen/hapus/') . $us['id']; ?>" class="badge badge-danger">Hapus</a>
                        <a href="<?= base_url('departemen/edit/') . $us['id']; ?>" class="badge badge-warning">Edit</a>
                           <a href="<?= base_url('departemen/detail/') . $us['id']; ?>"class="badge badge-info">Detail</a>
                          </td>
                          </tr>
                          <?php $i++; ?>
                        <?php endforeach; ?>
                      </tbody>
        </table>
    </div>
</div>
            