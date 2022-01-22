<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>Edit Produk</h3>
    <?php foreach ($koleksi as $kol) : ?>
        <form method="post" action="<?php echo base_url() . 'Galeri_admin/update' ?>">
            <div class="for-group">
                <label>Nama IKAN</label>
                <input type="hidden" name="id_ikan" class="form-control" value="<?php echo $kol->id_ikan ?>">
                <input type="text" name="nama_ikan" class="form-control" value="<?php echo $kol->nama_ikan ?>">
            </div>
            <div class="form-group">
                <label>KATEGORI</label>
                <input type="text" name="kategori" class="form-control" value="<?php echo $kol->kategori ?>">
            </div>
            <div class="form-group">
                <label>DESKRIPSI</label>
                <input type="text" name="deskripsi" class="form-control" value="<?php echo $kol->deskripsi ?>">
            </div>
            <div class="form-group">
                <label>USIA</label>
                <input type="int" name="usia" class="form-control" value="<?php echo $kol->usia ?>">
            </div>
            <div class="form-group">
                <label>UKURAN</label>
                <input type="int" name="ukuran" class="form-control" value="<?php echo $kol->ukuran ?>">
            </div>
            <div class="form-group">
                <label>KELAMIN</label>
                <input type="text" name="kelamin" class="form-control" value="<?php echo $kol->kelamin ?>">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>