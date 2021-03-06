<div id="app">
  <section class="section">
    <div class="d-flex flex-wrap align-items-stretch">
      <div class="col-lg-4 col-md-6 col-sm-12 col-12 order-lg-1 min-vh-100 order-2 bg-white">
        <div class="p-4 m-3">
          <h4 class="text-dark font-weight-normal">Selamat datang di <span class="font-weight-bold">SILOKER</span></h4>
          <p class="text-muted">Sebelum mulai, kamu harus login atau buat akun jika kamu tidak mempunyai akun</p>
          <!-- alert -->
          <?= $this->session->flashdata('message'); ?>
          <form method="POST" action="<?= base_url() ?>">
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" type="email" class="form-control" name="email" autocomplete="username" tabindex="1" value="<?= set_value('email') ?>" placeholder="Email address" autofocus>
              <small class="text-danger">
                <?= form_error('email'); ?>
              </small>
            </div>
            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label">Password</label>
              </div>
              <!-- <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="Enter Password"> -->
              <div class="input-group mb-3">
                <input type="password" name="password" id="password" placeholder="Enter password" class="form-control" tabindex="2" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"><i class="fas fa-eye-slash" id="show-password"></i></span>
                </div>
              </div>
              <small class="text-danger">
                <?= form_error('password'); ?>
              </small>
            </div>
            <!-- <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="show-password">
              <label class="form-check-label" for="show-password">Tampilkan Password</label>
            </div> -->
            <div class="form-group text-right">
              <a href="<?= base_url('authuser/lupaPassword') ?>" class="mt-3">
                Lupa Password?
              </a>
              <button type="submit" class="btn btn-primary btn-block btn-lg mt-2" tabindex="4">
                Login
              </button>
            </div>
            <div class="mt-5 text-center">
              Belum punya akun? <a href="<?= strtolower(base_url('authuser/buatAkun')) ?>">Buat Akun Sekarang.</a>
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
      <div class="col-lg-8 col-12 col-md-6 col-sm-12 order-lg-2 order-1">
        <img class="img-welcome" src="<?= base_url('assets/') ?>img/team.svg">
      </div>
    </div>
  </section>
</div>