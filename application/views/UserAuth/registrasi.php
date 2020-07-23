<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Register</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="<?= base_url('authuser/registration') ?>">
                <div class="row">
                  <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" value="<?= set_value('email') ?>" autofocus placeholder="Email address">
                    <small class=" text-danger">
                      <?= form_error('email'); ?>
                    </small>
                  </div>
                  <div class="form-group col-6">
                    <label for="no_hp">Nomor Handphone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Misal: 081282441221">
                    <small class="text-danger">
                      <?= form_error('no_hp'); ?>
                    </small>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="password1" class="d-block">Password</label>
                    <input id="password1" type="password" class="form-control pwstrength" name="password1">
                    <small class="text-danger">
                      <?= form_error('password1'); ?>
                    </small>
                    <small>Password minimal 4 karakter. </small>
                  </div>
                  <div class="form-group col-6">
                    <label for="password2" class="d-block">Konfirmasi Password</label>
                    <input id="password2" type="password" class="form-control" name="password2">
                    <small class="text-danger">
                      <?= form_error('password2'); ?>
                    </small>
                    <div class="form-group mt-2 form-check">
                      <input type="checkbox" class="form-check-input" id="tampilkan-password">
                      <label class="form-check-label" for="tampilkan-password">Tampilkan Password.</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                    <label class="custom-control-label" for="agree">Setuju dengan kebijakan kami!</label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Register
                  </button>
                </div>
                <div class="mt-5 text-center">
                  Sudah punya akun? Silahkan <a href="<?= base_url('authuser') ?>">Login Disini!</a>
                </div>
              </form>
            </div>
          </div>
          <div class="simple-footer">
            Copyright &copy; SILOKER <?= date('Y'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>