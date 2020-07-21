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
          <li class="breadcrumb-item"><a href="<?= site_url('info'); ?>"><i class="fas fa-info"></i> Info</a></li>
          <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li>
        </ol>
      </nav>
      <?php if (empty($info)) : ?>
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
                  <a href="<?= site_url('info'); ?>" class="btn btn-primary mt-4">Tambahkan Data</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="row">
        <?php foreach ($info as $in) : ?>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <figure class="figure">
                  <img src="<?= base_url('assets/upload/info/' . $in['gambar']); ?>" class="figure-img img-fluid rounded" style="height: 200px; width:100%;" alt="image">
                  <div class="text-center">
                    <a href="<?= site_url('info/detail/' . $in['id']); ?>" class="btn btn-outline-info btn-icon mb-3 icon-left"> <i class="fas fa-eye"></i> Detail Info</a>
                  </div>
                  <figcaption class="figure-caption text-xs-right font-weight-600 mb-2"><?= ucwords(word_limiter($in['judul_info'], 5)); ?></figcaption>
                  <p class="lead text-small">Dibuka Pendaftaran:<?= $in['tgl_mulai'] . ' s/d ' . $in['tgl_selesai']; ?></p>
                  <p class="lead text-small" style="margin-top: -10px;">Dibuka Untuk : <span class="font-weight-600"><?= strtoupper($in['keterangan']); ?></span></p>
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