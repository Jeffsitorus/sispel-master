 
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Perusahaan</h1>
          </div>

          <div class="section-body">
              <!-- Hero Profile -->
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image" data-background="<?= base_url('assets/')?>img/cover_profile.jpg">
                    <div class="hero-inner">
                        <div class="row">
                            <div class="col-sm-1 mr-3">
                                <figure class="avatar mr-2 avatar-xl">
                                    <img src="<?= base_url('assets/img/logo_company/') . $user['foto'] ?>">
                                    <i class="avatar-presence online"></i>
                                </figure>
                            </div>
                            <div class="col-sm-6">
                                <h2>Selamat Datang, <?= $user['nama']?> !</h2>
                                <p class="lead"><?= $user['nama_pt'] ?></p>
                                <p class="lead"><?= $user['website'] ?></p>
                                <p class="lead"><?= $user['telepon'] ?></p>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>Update Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Hero Profile -->
