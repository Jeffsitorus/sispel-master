<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail User <?= ucfirst($user_data['nama']); ?></h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="hero text-white hero-bg-image" data-background="<?= base_url('assets/') ?>img/cover_profile.jpg">
            <div class="hero-inner">
              <div class="row">
                <div class="col-sm-1 mr-3">
                  <figure class="avatar mr-2 avatar-xl">
                    <img src="<?= base_url('assets/img/profile/') . $user_data['foto'] ?>">
                    <i class="avatar-presence online"></i>
                  </figure>
                </div>
                <div class="col-sm-6">
                  <h2>Nama Lengkap : <?= $user_data['nama'] ?></h2>
                  <p class="lead">Status :
                    <?php if ($user_data['is_active']) : ?>
                      <span class="badge badge-success text-small"> Aktif </span>
                    <?php else : ?>
                      <span class="badge badge-danger text-small"> Tidak Aktif </span>
                    <?php endif; ?>
                  </p>
                  <div class="mt-4">
                    <a href="<?= site_url('admin/data_peserta'); ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-arrow-left"></i>Kembali</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Hero Profile -->

      <!-- Profile -->
      <div class="row">
        <div class="col-sm-7">
          <div class="card">
            <div class="card-header  bg-primary text-white">
              <h3><i class="fa fa-1x fa-user"></i> Profil</h3>
            </div>
            <div class="card-body">
              <dl class="row">
                <dt class="col-sm-3">No. KTP</dt>
                <dd class="col-sm-9"><?= $user_data['no_ktp'] ?></dd>
                <dt class="col-sm-3">Jenis Kelamin</dt>
                <dd class="col-sm-9">
                  <?= $user_data['jk'] ?>
                </dd>
                <dt class="col-sm-3">Tanggal Lahir</dt>
                <dd class="col-sm-9">
                  <?= tgl_indo($user_data['tgl_lahir']); ?>
                </dd>
                <dd class="col-sm-12">
                  <strong>Akun ini dibuat sejak :</strong> <?= date('d F Y', $user_data['date_created']); ?>
                </dd>
              </dl>
            </div>
          </div>
        </div>

        <div class="col-sm-5">
          <div class="card">
            <div class="card-header  bg-primary text-white">
              <h3><i class="fa fa-1x fa-phone"></i> Kontak</h3>
            </div>
            <div class="card-body">
              <dl class="row">
                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9"><?= $user_data['email'] ?></dd>
                <dt class="col-sm-3">No. HP</dt>
                <dd class="col-sm-9">
                  <?= $user_data['no_hp'] ?>
                </dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="card">
            <div class="card-header  bg-primary text-white">
              <h3><i class="fa fa-1x fa-graduation-cap"></i> Pendidikan</h3>
            </div>
            <div class="card-body">
              <dl class="row">
                <h5 class="col-sm-3">SMK</h5>
              </dl>
            </div>
          </div>
        </div>

        <div class="col-sm-7">
          <div class="card">
            <div class="card-header  bg-primary text-white">
              <h3><i class="fa fa-1x fa-home"></i> Alamat</h3>
            </div>
            <div class="card-body">
              <dl class="row">
                <dt class="col-sm-6"><?= $user_data['alamat']; ?></dt>
                <dt class="col-sm-4">Jawa Barat, Karawang</dt>
                <dt class="col-sm-2">41374</dt>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>