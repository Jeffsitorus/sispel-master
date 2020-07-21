<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Role</h1>
    </div>
  <div class="row">
    <div class="col-6">
    <a href="<?= base_url('admin/role') ?>" class="btn btn-primary mb-2"><< Kembali</a>
    <?= $this->session->flashdata('message'); ?>
        <div class="card">
          <div class="card-header">
            <?php foreach($role as $r) : ?>
            <?php endforeach; ?>
            <h4>Role Akses : <mark><?= $role['name_role']; ?></mark> </h4>
            <div class="card-header-form">
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>#</th>
                  <th>Submenu</th>
                  <th>Menu</th>
                </tr>
                <?php
                $no = 1; ?>
                <?php foreach($menu as $m) : ?> 
                <tr>
                    <td scope="row"><?= $no++ ?></td>
                    <td><?= $m['menu']; ?></td>   
                    <td>
                        <label class="custom-switch pl-1">
                            <input type="checkbox" name="custom-switch-checkbox" <?= check_akses($role['id_role'],$m['id']); ?> data-role="<?= $role['id_role']; ?>" data-menu="<?= $m['id']; ?>"  class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </td>   
                </tr>
            <?php endforeach; ?>
                </tr>
              </table>
            </div>
          </div>
        </div>
    </div>
    </div>
  </section>
</div>