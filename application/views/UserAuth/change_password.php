<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <!-- logo -->
          </div>
          <div class="card card-primary">
            <div class="card-header">
              <h4>Reset Password</h4>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="card-body">
              <form method="POST" action="<?= base_url('authuser/changePassword') ?>">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="text" placeholder="<?= $this->session->userdata('reset_email'); ?>" readonly disabled>
                </div>
                <div class="form-group">
                  <label for="password">Password Baru</label>
                  <input id="password1" type="password" class="form-control pwstrength" placeholder="Password Baru" data-indicator="pwindicator" name="password1" tabindex="2">
                  <small class="text-danger">
                    <?= form_error('password1'); ?>
                  </small>
                  <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password-confirm">Ulangi Password</label>
                  <input id="password-confirm" placeholder="Konfirmasi Password" type="password" class="form-control" name="password2" tabindex="2">
                  <small class="text-danger">
                    <?= form_error('password2'); ?>
                  </small>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Reset Password
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="simple-footer">
            Copyright &copy; Stisla 2020
          </div>
        </div>
      </div>
    </div>
  </section>
</div>