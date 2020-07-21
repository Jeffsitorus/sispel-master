<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
                  <li class="menu-header">Perusahaan</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Lowongan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('job/postJob') ?>">Post Lowongan</a></li>
                  <li><a class="nav-link" href="<?= base_url('job/dataPelamar') ?>">Data Pelamar</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Ubah Profil</span></a></li>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="<?= base_url('job/logout') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-exit"></i> LOGOUT
              </a>
            </div>
        </aside>
      </div>