<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <!-- button export data perusahaan -->
      <a href="<?= site_url('admin/data_perusahaan'); ?>" class="btn btn-danger btn-lg mb-2"><i class="fas fa-print"></i> Export Pdf</a>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tablePerusahaan">
              <thead class="bg-light">
                <tr>
                  <th>No</th>
                  <th>Nama Perusahaan</th>
                  <th>Email</th>
                  <th>No Telepon</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- looping data perusahaan -->

                <!-- end-looping -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>