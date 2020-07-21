<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $judul ?></h1>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="<?= site_url('admin/cetak_peserta') ?>" target="_blank" class="btn btn-danger btn-lg mb-2"><i class="fas fa-print"></i> Print Pdf</a>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="tablePeserta">
                <thead>
                  <tr>
                    <th class="text-center">
                      <i class="fas fa-th"></i>
                    </th>
                    <th>Nama Peserta</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php foreach ($user_data as $usr) : ?>
                  <tbody>
                    <tr>
                      <td>
                        <div class="sort-handler">
                          <i class="fas fa-th"></i>
                        </div>
                      </td>
                      <td><?= $usr['nama']; ?></td>
                      <td><?= $usr['jk']; ?></td>
                      <td><?= $usr['email']; ?></td>
                      <td><img alt="image" src="<?= base_url('assets/img/profile/') . $usr['foto']; ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $usr['nama'] ?>"></td>
                      <td class="text-center"><a href="<?= site_url('admin/detail_user/' . $usr['id_user']) ?>" class="btn btn-info">Detail</a></td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>