<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <a href="<?= site_url('pelatihan/jadwal') ?>" class="btn btn-info btn-lg mb-2">Kembali</a>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <?= form_open('pelatihan/jadwal_edit/' . $jadwal['id_jadwal']); ?>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="program_id">Program Pelatihan</label>
                    <input type="hidden" name="id_jadwal" value="<?= $jadwal['id_jadwal']; ?>">
                    <select name="program_id" id="program_id" class="form-control">
                      <?php foreach ($program as $pg) : ?>
                        <option value="<?= $pg['id_program'] ?>" <?php if ($pg['id_program'] == $jadwal['program_id']) {
                                                                    echo "selected";
                                                                  } ?>><?= $pg['judul_program'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('program_id', '<div class="text-danger small mt-2">', '</div>'); ?>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="tgl_pendaftaran">Buka Pendaftaran</label>
                        <input type="date" name="tgl_pendaftaran" id="tgl_pendaftaran" value="<?= $jadwal['tgl_pendaftaran']; ?>" class="form-control">
                        <?= form_error('tgl_pendaftaran', '<div class="text-danger small mt-2">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="tutup_pendaftaran">Tutup Pendaftaran</label>
                        <input type="date" name="tutup_pendaftaran" id="tutup_pendaftaran" value="<?= $jadwal['tutup_pendaftaran']; ?>" class="form-control">
                        <?= form_error('tutup_pendaftaran', '<div class="text-danger small mt-2">', '</div>'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="tgl_pelaksanaan">Tanggal Pelaksanaan</label>
                        <input type="date" name="tgl_pelaksanaan" id="tgl_pelaksanaan" value="<?= $jadwal['tgl_pelaksanaan']; ?>" class="form-control">
                        <?= form_error('tgl_pelaksanaan', '<div class="text-danger small">', '</div>'); ?>
                        <?php if ($this->session->flashdata('input_error')) : ?>
                          <div class="text-danger small mt-2"><?= $this->session->flashdata('input_error'); ?></div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="selesai_pelaksanaan">Tanggal Pelaksanaan</label>
                        <input type="date" name="selesai_pelaksanaan" id="selesai_pelaksanaan" value="<?= $jadwal['selesai_pelaksanaan']; ?>" class="form-control">
                        <?= form_error('selesai_pelaksanaan', '<div class="text-danger small">', '</div>'); ?>
                        <?php if ($this->session->flashdata('input_error')) : ?>
                          <div class="text-danger small mt-2"><?= $this->session->flashdata('input_error'); ?></div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="hari">Hari Pelatihan</label>
                    <input type="text" name="hari" id="hari" value="<?= $jadwal['hari']; ?>" class="form-control" autocomplete="off">
                    <?= form_error('hari', '<div class="text-danger small">', '</div>'); ?>
                    <?php if ($this->session->flashdata('input_errors')) : ?>
                      <div class="text-danger small mt-2"><?= $this->session->flashdata('input_errors'); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                    <label for="lokasi">Lokasi pelatihan</label>
                    <textarea name="lokasi" id="lokasi" class="form-control" placeholder="Masukkan lokasi"><?= $jadwal['lokasi']; ?></textarea>
                    <?= form_error('lokasi', '<div class="text-danger small">', '</div>'); ?>
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