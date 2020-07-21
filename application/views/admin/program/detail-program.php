<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-sm-12">
          <a href="<?= site_url('pelatihan/program'); ?>" class="btn btn-info btn-lg mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
          <div class="card card-primary">
            <div class="card-body">
              <h4><?= $program['judul_program']; ?></h4>
              <p class="lead">Deskripsi</p>
              <?= $program['deskripsi']; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>