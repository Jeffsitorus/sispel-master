<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard Sispel</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="hero bg-primary text-white">
            <div class="hero-inner">
              <h2>Welcome Back, <?= $user['nama']; ?>!</h2>
              <p class="lead">Sispel | Sistem informasi pelatihan kerja berbasis web.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="alert alert-info">
            <div class="alert-title">Information</div>
            Data Statistik Sispel
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Tampilkan / Sembunyikan</h4>
              <div class="card-header-action">
                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
              </div>
            </div>
            <div class="collapse show" id="mycard-collapse">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-info">
                        <i class="fas fa-layer-group"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Program Pelatihan</h4>
                        </div>
                        <div class="card-body">
                          <?= $program; ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-warning">
                        <i class="fas fa-th"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Kategori Pelatihan</h4>
                        </div>
                        <div class="card-body">
                          <?= $kapel; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                Statistik Sispel
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Tampilkan / Sembunyikan</h4>
              <div class="card-header-action">
                <a data-collapse="#mycard-collapse2" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
              </div>
            </div>
            <div class="collapse show" id="mycard-collapse2">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                        <i class="fas fa-info-circle"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Total Info</h4>
                        </div>
                        <div class="card-body">
                          <?= $info; ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-success">
                        <i class="far fa-user"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>User Role</h4>
                        </div>
                        <div class="card-body">
                          <?= $user['id_role']; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                Statistik Sispel
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-sm-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Tampilkan / Sembunyikan</h4>
              <div class="card-header-action">
                <a data-collapse="#mycard-collapse3" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
              </div>
            </div>
            <div class="collapse show" id="mycard-collapse3">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-info">
                        <i class="fas fa-layer-group"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Total Peserta</h4>
                        </div>
                        <div class="card-body">
                          <!-- code -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-warning">
                        <i class="fas fa-users"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                          <!-- code -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                Statistik Sispel
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h4>Tampilkan / Sembunyikan</h4>
              <div class="card-header-action">
                <a data-collapse="#mycard-collapse4" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
              </div>
            </div>
            <div class="collapse show" id="mycard-collapse4">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                        <i class="fas fa-list"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Kategori Peserta</h4>
                        </div>
                        <div class="card-body">
                          <!-- code -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Total Kelulusan</h4>
                        </div>
                        <div class="card-body">
                          <!-- code -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                Statistik Sispel
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>