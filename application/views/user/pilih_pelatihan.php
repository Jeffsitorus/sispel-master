<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pilih Pelatihan</h1>
    </div>
    <div class="section-body">
      <h2 class="section-title">Data Pelatihan</h2>
      <p class="section-lead">Silahkan memilih pelatihan yang sesuai minat dan bakat anda.</p>
      <div class="card">
        <div class="card-body">
          <div class="row mt-4">
            <div class="col-12 col-lg-8 offset-lg-2">
              <div class="wizard-steps">
                <div class="wizard-step wizard-step-active">
                  <div class="wizard-step-icon">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="wizard-step-label">
                    Data Pribadi
                  </div>
                </div>
                <div class="wizard-step wizard-step-active">
                  <div class="wizard-step-icon">
                    <i class="fas fa-box-open"></i>
                  </div>
                  <div class="wizard-step-label">
                    Pilih Pelatihan
                  </div>
                </div>
                <div class="wizard-step">
                  <div class="wizard-step-icon">
                    <i class="fas fa-server"></i>
                  </div>
                  <div class="wizard-step-label">
                    Server Information
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- content data pelatihan -->
          <div class="row">
            <?php foreach ($jadwal as $jdw) : ?>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xl-4">
                <div class="card">
                  <div class="card-body">
                    <figure class="figure">
                      <img src="<?= base_url('assets/upload/program/' . $jdw['gambar']); ?>" class="card-img-top" style="height:fit-content" alt="image">
                      <div class="text-center">
                        <a href="<?= site_url('user/detailPelatihan/' . $jdw['id_jadwal']); ?>" class="btn btn-outline-info btn-icon mb-3 mt-3 icon-left"><i class="fas fa-eye"></i> Detail Pelatihan</a>
                      </div>
                      <figcaption class="figure-caption text-xs-right font-weight-600 mb-2"><?= $jdw['judul_program']; ?></figcaption>
                      <p class="lead text-small">Tanggal Pendaftaran:<?= $jdw['tgl_pendaftaran'] . ' s/d ' . $jdw['tutup_pendaftaran']; ?></p>
                      <p class="lead text-small" style="margin-top: -15px;">Tanggal Pelaksanaan:<?= $jdw['tgl_pelaksanaan'] . ' s/d ' . $jdw['selesai_pelaksanaan']; ?></p>
                    </figure>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <?= $this->pagination->create_links(); ?>

          <div class="card-footer bg-whitesmoke">
            SISPEL | Kelompok 1
          </div>
        </div>
      </div>
  </section>
</div>