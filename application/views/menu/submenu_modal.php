<!-- Modal Tambah Submenu -->
<div class="modal fade" id="addSubmenu" tabindex="-1" role="dialog" aria-labelledby="addSubmenuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSubmenuLabel">Tambah Submenu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu') ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input name="judul" type="text" class="form-control" id="judul" placeholder="Nama Sub Menu">
          </div>
          <div class="form-group">
            <select class="form-control" name="menu_id" id="menu_id">
              <option value="">Pilih Menu</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input name="url" type="text" class="form-control" id="url" placeholder="URL Submenu">
          </div>
          <div class="form-group">
            <b data-toggle="tooltip" title="Hello, untuk menambah icon, anda hanya perlu menambahkan nama icon yang bisa anda dapatkan dari font-awesome, contoh : fas fa-user-alt.">Cara Menambah Icon</b>
            <input name="icon" type="text" class="form-control" id="icon" placeholder="Icon Menu">
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
              <label class="form-check-label" for="is_active">
                Active?
              </label>
            </div>
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

<?php foreach ($subMenu as $sm) : ?>

  <!-- Modal Edit submenu -->
  <div class="modal fade" id="editSubmenu<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubmenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSubmenuLabel">Ubah Submenu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('menu/updateSubmenu') ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input name="idSubmenu" type="hidden" class="form-control" id="formGroupExampleInput" value="<?= $sm['id']; ?>">
              <input name="judul" type="text" value="<?= $sm['judul']; ?>" class="form-control" id="judul" placeholder="Nama Sub Menu">
            </div>
            <div class="form-group">
              <select class="form-control" name="menu_id" id="menu_id">
                <?php foreach ($menu as $m) : ?>
                  <option value="<?= $m['id']; ?>" <?php if ($m['id'] == $sm['menu_id']) {
                                                      echo "selected";
                                                    } ?>><?= $m['menu']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <input name="url" type="text" value="<?= $sm['url']; ?>" class="form-control" id="url" placeholder="URL Submenu">
            </div>
            <div class="form-group">
              <b data-toggle="tooltip" title="Hello, untuk menambah icon, anda hanya perlu menambahkan nama icon yang bisa anda dapatkan dari font-awesome, contoh : fas fa-user-alt.">Cara Menambah Icon</b>
              <input name="icon" type="text" value="<?= $sm['icon']; ?>" class="form-control" id="icon" placeholder="Icon Menu">
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                <label class="form-check-label" for="is_active">
                  Active?
                </label>
              </div>
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

  <!-- Modal Hapus Menu -->
  <div class="modal fade" id="hapusSubmenu<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addMenuLabel">Hapus Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('menu/deleteSubmenu/' . $sm['id']) ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <p class="lead mt-4">Yakin ingin hapus submenu <?= $sm['judul']; ?> ?</p>
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