<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Submenu Management</h1>
    </div>
    <!-- Tabel Submenu -->
    <div class="row">
      <div class="col-12">
        <?php
        if (validation_errors()) : ?>
          <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
          </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
        <a href="#" class="btn btn-primary btn-lg mb-3" data-toggle="modal" data-target="#addSubmenu">Tambah Submenu</a>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="tableSubmenu">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Submenu</th>
                    <th>Menu</th>
                    <th>URL</th>
                    <th>Icon</th>
                    <th>Active</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1; ?>
                  <?php foreach ($subMenu as $sm) : ?>
                    <tr>
                      <td scope="row"><?= $no++ ?></td>
                      <td><?= $sm['judul']; ?></td>
                      <td><?= $sm['menu']; ?></td>
                      <td><mark><?= $sm['url']; ?></mark></td>
                      <td><i class="<?= $sm['icon']; ?>"></i></td>
                      <td>
                        <?php if ($sm['is_active'] == 1) : ?>
                          <div class="badge badge-success">Aktif</div>
                        <?php else : ?>
                          <div class="badge badge-warning">Tidak Aktif</div>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#editSubmenu<?= $sm['id']; ?>" class="btn btn-success">Ubah</a>
                        <a href="#" data-toggle="modal" data-target="#hapusSubmenu<?= $sm['id']; ?>" class="btn btn-danger">Hapus</a>
                      </td>
                    <?php endforeach; ?>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include('submenu_modal.php'); ?>