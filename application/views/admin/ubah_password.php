<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $judul; ?></h1>
    </div>
    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <div class="row mt-4">
            <div class="col-sm-6">
              <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="col-12 ">
              <div class="wizard-steps">
                <div class="wizard-step wizard-step-active">
                  <div class="wizard-step-icon">
                    <i class="fas fa-key"></i>
                  </div>
                  <div class="wizard-step-label">
                    <?= $judul; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <form class="form" method="post" action="<?= base_url('admin/ubah_password'); ?>">
            <div class="form-group row ml-3">
              <div class="col-sm-4">
                <label for="inputPassword6">Password Lama</label>
                <input type="password" placeholder="Masukan Password Lama" name="oldpassword" class="form-control " aria-describedby="passwordHelpInline">
                <small class="text-danger">
                  <?= form_error('oldpassword'); ?>
                </small>
              </div>
              <div class="col-sm-4">
                <label for="inputPassword6">Password Baru</label>
                <input type="password" placeholder="Masukan Password Baru" name="newpassword" class="form-control " aria-describedby="passwordHelpInline">
                <small class="text-danger">
                  <?= form_error('newpassword'); ?>
                </small>
                <small class="text-muted">
                  Password Harus Lebih Dari 5 Karakter
                </small>
              </div>
              <div class="col-sm-4">
                <label for="inputPassword6">Konfirmasi Password</label>
                <input type="password" placeholder="Konfirmasi Password" name="newpassword_confirm" class="form-control " aria-describedby="passwordHelpInline">
                <small class="text-danger">
                  <?= form_error('newpassword_confirm'); ?>
                </small>
                <small class="text-muted">
                  Password Harus Lebih Dari 5 Karakter
                </small>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm ">
                <a href="<?= site_url('admin/profil') ?>" class="btn btn-md btn-warning mr-2 ml-4">Kembali</a>
                <button type="submit" class="btn btn-md btn-primary mr-3">Ubah Password</button>
              </div>
            </div>
          </form>
          <div class="card-footer bg-whitesmoke">
            SISPEL | Kelompok 1
          </div>
        </div>
      </div>
    </div>
  </section>
</div>