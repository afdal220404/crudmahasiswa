<div class="container-fluid">
     <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
      <div class="row">
         <div class="col-md-6"><a href="<?= base_url() ?>calon_presiden/tambah" class="btn btn-info mb-2">Tambah Calon Presiden</a></div>
          <div class="col-md-12">
             <table class="table"> 
                <thead>
                     <tr>
                         <td>No</td>
                         <td>Nama</td>
                         <td>Umur</td>
                         <td>Partai Pendukung</td> 
                         <td>Aksi</td> 
                        </tr> 
                    </thead> 
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($calon_presiden as $us) : ?>
                           <tr>
                              <td> <?= $i;?>.</td>
                              <td> <?= $us['nama_lengkap'];?></td>
                              <td> <?= $us['umur'];?></td>
                              <td> <?= $us['partai_pendukung'];?></td>
                              <td>
                                 <a href="<?= base_url('calon_presiden/hapus/') . $us['id']; ?>"class="badge badge-danger">Hapus</a>
                                 <a href="<?= base_url('calon_presiden/edit/') . $us['id']; ?>"class="badge badge-warning">Edit</a>
                                 <a href="<?= base_url('calon_presiden/detail/') . $us['id']; ?>"class="badge badge-info">Detail</a>
                              </td>
                           </tr>
                           <?php $i++; ?>
                           <?php endforeach; ?>
                </tbody> 
             </table>
</div>
</div>
</div>