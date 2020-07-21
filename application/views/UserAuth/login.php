  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <h4 class="text-dark font-weight-normal">Selamat datang di <span class="font-weight-bold">SISPEL</span></h4>
            <p class="text-muted">Sebelum mulai, kamu harus login atau buat akun jika kamu tidak mempunyai akun</p>
            <!-- alert -->
            <?= $this->session->flashdata('message'); ?>
            <form method="POST" action="<?= base_url() ?>">
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" value="<?= set_value('email') ?>" placeholder="Email address" autofocus>
                <small class="text-danger">
                  <?= form_error('email'); ?>
                </small>
              </div>
              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="Enter Password">
                <small class="text-danger">
                  <?= form_error('password'); ?>
                </small>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="show-password">
                <label class="form-check-label" for="show-password">Tampilkan Password</label>
              </div>
              <div class="form-group text-right">
                <a href="<?= base_url('authuser/lupaPassword') ?>" class="float-left mt-3">
                  Lupa Password?
                </a>
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>
              <div class="mt-5 text-center">
                Tidak punya akun? <a href="<?= strtolower(base_url('authuser/buatAkun')) ?>">Buat Akun</a>
              </div>
            </form>
            <div class="text-center mt-5 text-small">
              Copyright &copy; Kelompok 1. Made with 💙 by Stisla
              <div class="mt-2">
                <a href="javascript:void(0)">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="javascript:void(0)">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1">
          <img class="img-welcome" src="<?= base_url('assets/') ?>img/team.svg">
        </div>
      </div>
    </section>
  </div>