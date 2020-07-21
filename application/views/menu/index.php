<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Menu</h1>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <?php
            if (validation_errors()) : ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="#" class="btn btn-primary btn-lg mb-3" data-toggle="modal" data-target="#addMenu">Tambah Menu</a>
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Menu</th>
                  <th scope="col" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1; ?>
                <?php foreach ($menu as $m) : ?>
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $m['menu']; ?></td>
                    <td width="25%" class="text-center">
                      <a href="#" data-toggle="modal" data-target="#editMenu<?= $m['id']; ?>" class="badge badge-success"><i class="fas fa-edit"></i> Ubah</a>
                      <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#hapusMenu<?= $m['id']; ?>"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal Tambah Menu -->
<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="addMenuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMenuLabel">Tambah Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input name="menu" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Menu">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($menu as $m) : ?>
  <!-- Modal Edit Menu -->
  <div class="modal fade" id="editMenu<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addMenuLabel">Edit Nama Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('menu/updateMenu') ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input name="idmenu" type="hidden" class="form-control" id="formGroupExampleInput" value="<?= $m['id']; ?>">
              <input name="menu" type="text" class="form-control" id="formGroupExampleInput" value="<?= $m['menu']; ?>"="Nama Menu">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Hapus Menu -->
  <div class="modal fade" id="hapusMenu<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addMenuLabel">Hapus Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('menu/deleteMenu/' . $m['id']) ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <p class="lead mt-4">Yakin ingin hapus menu <?= $m['menu'] ?> ?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>