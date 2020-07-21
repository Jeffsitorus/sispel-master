<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <!-- content  edit kategori-->
      <div class="row">
        <div class="col-lg-6 offset-lg-3 offset-md-3 col-md-6 col-sm-12 col-12">
          <div class="text-right">
            <a href="<?= site_url('info/kategori'); ?>" class="btn btn-info btn-lg mb-2">Kembali</a>
          </div>
          <div class="card">
            <div class="card-body">
              <?= form_open('info/kategori_edit/' . $kategori['id']); ?>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" value="<?= $kategori['keterangan']; ?>" class="form-control" placeholder="Enter keterangan">
                <?= form_error('keterangan', '<div class="text-danger small">', '</div>'); ?>
              </div>
              <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary btn-lg">
                <button type="reset" class="btn btn-danger btn-lg">Batal</button>
              </div>
              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>