<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <a href="<?= site_url('pelatihan/program') ?>" class="btn btn-info btn-lg mb-2">Kembali</a>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <?= form_open_multipart('pelatihan/program_tambah'); ?>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="judul_program">Judul Program</label>
                    <input type="text" name="judul_program" id="judul_program" value="<?= set_value('judul_program'); ?>" class="form-control" placeholder="Nama program pelatihan" autocomplete="off">
                    <?= form_error('judul_program', '<div class="text-danger small mt-2">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="kapel_id">Kategori Pelatihan</label>
                    <select name="kapel_id" id="kapel_id" class="form-control">
                      <option value="">== Pilih ==</option>
                      <?php foreach ($kapel as $kp) : ?>
                        <option value="<?= $kp['id']; ?>"><?= $kp['keterangan']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('kapel_id', '<div class="text-danger small mt-2">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="kategori_id">Kategori Peserta</label>
                    <select name="kategori_id" id="kategori_id" class="form-control">
                      <option value="">== Pilih ==</option>
                      <?php foreach ($kategori as $kat) : ?>
                        <option value="<?= $kat['id_kategori']; ?>"><?= $kat['nama_kategori']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('kategori_id', '<div class="text-danger small mt-2">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="kode_program">Kode Program</label>
                    <input type="text" name="kode_program" id="kode_program" value="<?= $kode_program; ?>" class="form-control" readonly>
                    <?= form_error('kode_program', '<div class="text-danger small mt-2">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="lama_pelaksanaan">Lama Pelaksanaan</label>
                    <input type="number" name="lama_pelaksanaan" id="lama_pelaksanaan" value="<?= set_value('lama_pelaksanaan'); ?>" class="form-control" placeholder="hari" autocomplete="off">
                    <?= form_error('lama_pelaksanaan', '<div class="text-danger small">', '</div>'); ?>
                    <?php if ($this->session->flashdata('input_error')) : ?>
                      <div class="text-danger small mt-2"><?= $this->session->flashdata('input_error'); ?></div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <?php if (!empty($this->session->flashdata('error_upload'))) : ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                      </button>
                      <?= $this->session->flashdata('error_upload'); ?>
                    </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <label for="batas_kuota">Batas Kuota</label>
                    <input type="number" name="batas_kuota" id="batas_kuota" value="<?= set_value('batas_kuota'); ?>" class="form-control" placeholder="orang" autocomplete="off">
                    <?= form_error('batas_kuota', '<div class="text-danger small">', '</div>'); ?>
                    <?php if ($this->session->flashdata('input_errors')) : ?>
                      <div class="text-danger small mt-2"><?= $this->session->flashdata('input_errors'); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi"></textarea>
                    <?= form_error('deskripsi', '<div class="text-danger small">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="gambar">Upload Gambar</label>
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Choose File</label>
                      <input type="file" name="gambar" id="image-upload" />
                    </div>
                    <span>Format file <strong>[jpg|png|jpeg]</strong> maksimal 1mb.</span>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-primary btn-lg">
                    <input type="reset" value="Batal" class="btn btn-danger btn-lg">
                  </div>
                </div>
              </div>
              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>