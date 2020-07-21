<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <div class="text-right">
        <a href="<?= site_url('info'); ?>" class="btn btn-info btn-lg mb-2">Kembali</a>
      </div>
      <div class="card">
        <div class="card-body">

          <!-- form create info -->
          <?= form_open_multipart('info/info_edit/' . $info['id']); ?>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="kategori_id">Kategori Info</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                  <?php foreach ($kategori as $k) : ?>
                    <option value="<?= $k['id'] ?>" <?php if ($k['id'] == $info['id']) {
                                                      echo "selected";
                                                    } ?>><?= $k['keterangan']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('kategori_id', '<div class="text-danger small mt-2">', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="judul_info">Judul Info</label>
                <input type="text" name="judul_info" id="judul_info" value="<?= $info['judul_info']; ?>" class="form-control" placeholder="Judul info">
                <?= form_error('judul_info', '<div class="text-danger small mt-2">', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" value="<?= $info['tgl_mulai']; ?>" id="tgl_mulai" class="form-control">
                <?= form_error('tgl_mulai', '<div class="text-danger small mt-2">', '</div>'); ?>
              </div>
            </div>
            <div class="col-lg-6">
              <?php if (!empty($this->session->flashdata('error_upload'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                  <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error_upload'))); ?>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="date" name="tgl_selesai" id="tgl_selesai" value="<?= $info['tgl_selesai']; ?>" class="form-control">
                <?= form_error('tgl_selesai', '<div class="text-danger small mt-2">', '</div>'); ?>
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <img src="<?= base_url('assets/upload/' . $info['gambar']) ?>" width="150px" class="border rounded" alt="image">
                </div>
                <div class="col-sm-7">
                  <div class="form-group">
                    <label for="gambar">Tanggal Selesai</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    <span>Format file [jpg|png|jpeg|svg] maksimal 2mb.</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary btn-lg">
                <button type="reset" class="btn btn-danger btn-lg">Batal</button>
              </div>
            </div>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </section>
</div>