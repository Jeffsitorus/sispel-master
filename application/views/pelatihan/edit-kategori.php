<?php foreach ($kategori as $key => $k) : ?>
<!-- modal create kategori -->
<div class="modal fade" id="editKategori<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form edit kategori -->
        <?= form_open('pelatihan/kategori_edit'); ?>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <input type="hidden" name="id" value="<?= $k['id']; ?>">
          <input type="text" name="keterangan" id="keterangan" value="<?= $k['keterangan']; ?>" class="form-control" placeholder="Enter kategori" required autocomplete="off" autofocus>
          <?= form_error('keterangan', '<div class="text-danger small mt-2">', '</div>'); ?>
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

<?php endforeach; ?>