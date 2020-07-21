<!-- modal create kategori -->
<div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form add kategori -->
        <?= form_open('info/kategori_add'); ?>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <input type="text" name="keterangan" id="keterangan" value="<?= set_value('keterangan'); ?>" class="form-control" placeholder="Enter kategori" required autocomplete="off" autofocus>
          <?= form_error('keterangan', '<div class="text-danger small">', '</div>'); ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>
<!-- end -->