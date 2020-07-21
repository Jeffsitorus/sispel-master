<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Role</h1>
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
            <a href="#" class="btn btn-primary btn-lg mb-3" data-toggle="modal" data-target="#newRole"> Tambah Role</a>
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Role</th>
                  <th scope="col" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1; ?>
                <?php foreach ($role as $r) : ?>
                  <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $r['name_role']; ?></td>
                    <td width="35%" class="text-center">
                      <a href="<?= base_url('admin/akses_role/') . $r['id_role']; ?>" class="badge badge-info"> <i class="fas fa-user-cog"></i> Akses</a>
                      <a href="#" data-toggle="modal" data-target="#editRole<?= $r['id_role']; ?>" class="badge badge-success"> <i class="fas fa-edit"></i> Ubah</a>
                      <a href="javascript:void(0);" data-toggle="modal" data-target="#hapusRole<?= $r['id_role']; ?>" class="badge badge-danger"> <i class="fas fa-trash-alt"></i> Hapus</a>
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

<!-- Modal Tambah Role -->
<div class="modal fade" id="newRole" tabindex="-1" role="dialog" aria-labelledby="addRoleLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addRoleLabel">Tambah Role Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input name="addRole" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Role">
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

<?php foreach ($role as $r) : ?>
  <!-- Modal Edit Role -->
  <div class="modal fade" id="editRole<?= $r['id_role']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRoleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editRoleLabel">Edit Data Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('admin/editRole') ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" value="<?= $r['id_role']; ?>" name="id_role">
              <input name="editRole" value="<?= $r['name_role']; ?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Role">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Hapus Role -->
  <div class="modal fade" id="hapusRole<?= $r['id_role']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusRoleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapusRoleLabel">Hapus Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('admin/hapusRole/' . $r['id_role']) ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <p class="lead mt-4">Yakin ingin hapus Role <?= $r['name_role']; ?> ?</p>
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