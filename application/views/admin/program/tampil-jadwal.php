<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-info text-white-all">
          <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?= site_url('pelatihan/jadwal'); ?>"><i class="fas fa-calendar"></i> Jadwal</a></li>
          <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
        </ol>
      </nav>
      <?php if (empty($jadwal)) : ?>
        <div class="row">
          <div class="col-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Kosong</h4>
              </div>
              <div class="card-body">
                <div class="empty-state" data-height="250" style="height: 250px;">
                  <div class="empty-state-icon">
                    <i class="fas fa-question"></i>
                  </div>
                  <h2>Kami tidak dapat menemukan data apa pun!</h2>
                  <p class="lead">
                    Maaf kami tidak dapat menemukan data apa pun, untuk menyingkirkan pesan ini, buat setidaknya 1 entri.
                  </p>
                  <a href="<?= site_url('pelatihan/jadwal'); ?>" class="btn btn-primary mt-4">Tambahkan Data</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="row">
        <?php foreach ($jadwal as $jdw) : ?>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <figure class="figure">
                  <img src="<?= base_url('assets/upload/program/' . $jdw['gambar']); ?>" class="figure-img img-fluid rounded" style="height: 200px; width:100%;" alt="image">
                  <div class="text-center">
                    <a href="<?= site_url('pelatihan/detail/' . $jdw['program_id']); ?>" class="btn btn-outline-info btn-icon mb-3 icon-left"> <i class="fas fa-eye"></i> Detail Pelatihan</a>
                  </div>
                  <figcaption class="figure-caption text-xs-right font-weight-600 mb-2"><?= $jdw['judul_program']; ?></figcaption>
                  <p class="lead text-small">Tanggal Pendaftaran:<?= tgl_indo($jdw['tgl_pendaftaran']) . ' s/d ' . tgl_indo($jdw['tutup_pendaftaran']); ?></p>
                  <p class="lead text-small" style="margin-top: -15px;">Tanggal Pelaksanaan:<?= tgl_indo($jdw['tgl_pelaksanaan']) . ' s/d ' . tgl_indo($jdw['selesai_pelaksanaan']); ?></p>
                </figure>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?= $this->pagination->create_links(); ?>
    </div>
  </section>
</div>