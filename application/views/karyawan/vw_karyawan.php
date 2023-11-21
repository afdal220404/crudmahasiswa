<div class="container-fluid">
     <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
      <div class="row">
         <div class="col-md-6"><a href="<?= base_url() ?>index.php/karyawan/tambah" class="btn btn-info mb-2">Tambah Karyawan</a></div>
          <div class="col-md-12">
          <?= $this -> session -> flashdata('message');?>
             <table class="table"> 
                <thead>
                     <tr>
                         <td>No</td>
                         <td>Nama</td>
                         <td>departemen</td>
                         <td>jabatan</td> 
                         <td>Aksi</td> 
                        </tr> 
                    </thead> 
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($karyawan as $us) : ?>
                           <tr>
                              <td> <?= $i;?>.</td>
                              <td> <?= $us['nama_karyawan'];?></td>
                              <td> <?= $us['departemen'];?></td>
                              <td> <?= $us['jabatan'];?></td>
                              <td>
                                 <a href="<?= base_url('karyawan/hapus/') . $us['id']; ?>"class="badge badge-danger">Hapus</a>
                                 <a href="<?= base_url('karyawan/edit/') . $us['id']; ?>"class="badge badge-warning">Edit</a>
                                 <a href="<?= base_url('karyawan/detail/') . $us['id']; ?>"class="badge badge-info">Detail</a>
                              </td>
                           </tr>
                           <?php $i++; ?>
                           <?php endforeach; ?>
                </tbody> 
             </table>
</div>
</div>
</div>