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
              <h4>Lupa Password</h4>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <p class="text-muted">Kami akan mengirim link ke email anda untuk reset password anda</p>
              <form method="POST" action="<?= base_url('authuser/lupaPassword') ?>">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" placeholder="Masukan Email Anda" name="email" tabindex="1" autofocus>
                  <small class="text-danger">
                    <?= form_error('email'); ?>
                  </small>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Kirim
                  </button>
              </form>
              <a href="<?= base_url('authuser/halamanLogin') ?>" class="btn btn-success btn-lg btn-block" tabindex="4">
                Login
              </a>
            </div>
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