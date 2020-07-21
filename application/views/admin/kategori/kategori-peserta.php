<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-sm-6">
          <!-- Button add kategori peserta  -->
          <button type="button" class="btn btn-primary btn-lg mb-2" data-toggle="modal" data-target="#addKategoriPeserta">
            Tambah Kategori
          </button>
        </div>
        <div class="col-sm-6">
          <?php if (validation_errors() != null) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <?= strip_tags(str_replace('</p>', '', validation_errors())); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Show/Hide</h4>
              <div class="card-header-action">
                <a href="#" data-collapse="#mycard-collapse" class="btn btn-info btn-icon"><i class="fas fa-minus"></i></a>
              </div>
            </div>
            <div class="collapse show" id="mycard-collapse">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori Peserta</th>
                        <th>Diinput</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- looping data kategori peserta -->
                      <?php foreach ($kategori as $key => $kat) : ?>
                        <tr>
                          <td><?= $key + 1; ?></td>
                          <td class="font-weight-bold"><?= strtoupper($kat['nama_kategori']); ?></td>
                          <td><?= $kat['created_at']; ?></td>
                          <td width="23%">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editKategoriPeserta<?= $kat['id_kategori']; ?>">
                              <i class="fas fa-edit"></i> Update</a>
                            <a href="<?= site_url('kategori/hapusKategoriPeserta/' . $kat['id_kategori']) ?>" class="btn btn-danger btn-delete">
                              <i class="fas fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      <!-- end -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Modal add kategori peserta-->
<?php include_once('tambah_kategori_peserta.php'); ?>
<!-- Modal edit kategori peserta-->
<?php include_once('edit_kategori_peserta.php'); ?>