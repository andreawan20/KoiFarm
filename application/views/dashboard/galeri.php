<?= $this->session->flashdata('message'); ?>

<div class="container-fluid">
  <button id="btn" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-plus fa-sm"></i> Tambah Galeri</button>

  <table class="table table-bordered">
    <tr>
      <th>NO</th>
      <th>NAMA IKAN</th>
      <th>KATEGORI</th>
      <th>DESKRIPSI</th>
      <th>USIA</th>
      <th>UKURAN</th>
      <th>KELAMIN</th>
      <th>GAMBAR</th>
      <th colspan="2">AKSI</th>
    </tr>

    <?php
    $no = 1;
    foreach ($koleksi as $kol) : ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $kol->nama_ikan ?></td>
        <td><?php echo $kol->kategori ?></td>
        <td><?php echo $kol->deskripsi ?></td>
        <td>Ukuran <?php echo $kol->ukuran ?> CM</td>
        <td>Usia <?php echo $kol->usia ?> Bulan</td>
        <td><?php echo $kol->kelamin ?></td>
        <td><img src="<?php echo base_url() . '/uploads/' . $kol->gambar ?>" class="card-img-top" alt="..." style='width:90%'></td>
        <td><?php echo anchor('Galeri_admin/edit/' . $kol->id_ikan, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></li></div>') ?></td>
        <td onclick="javascript: return confirm('Anda yakin ingin menghapus data ini?')">
          <?php echo anchor('Galeri_admin/hapus/' . $kol->id_ikan, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></li></div>') ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'Galeri_admin/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label>NAMA IKAN</label>
            <input type="text" name="nama_ikan" class="form-control">
          </div>
          <div class="form-group">
            <label>KATEGORI</label>
            <input type="text" name="kategori" class="form-control">
          </div>
          <div class="form-group">
            <label>DESKRIPSI</label>
            <input type="text" name="deskripsi" class="form-control">
          </div>
          <div class="form-group">
            <label>USIA</label>
            <input type="int" name="usia" class="form-control">
          </div>
          <div class="form-group">
            <label>UKURAN</label>
            <input type="int" name="ukuran" class="form-control">
          </div>
          <div class="form-group">
            <label>KELAMIN</label>
            <input type="text" name="kelamin" class="form-control">
          </div>
          <div class="form-group">
            <label>GAMBAR</label><br>
            <input type="file" name="gambar" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>