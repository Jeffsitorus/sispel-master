<div class="modal fade" id="addKategoriPeserta" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kategori Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('kategori/tambahKategoriPeserta'); ?>
        <div class="form-group">
          <label for="nama_kategori">Nama Kategori</label>
          <input type="text" name="nama_kategori" id="nama_kategori " class="form-control" placeholder="Kategori Peserta">
          <?= form_error('nama_kategori', '<div class="text-danger small">', '</div>'); ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>