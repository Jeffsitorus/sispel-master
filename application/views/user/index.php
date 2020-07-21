<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Peserta</h1>
        </div>

        <div class="section-body">
            <!-- Hero Profile -->
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            <div class="alert-title">
                                Selamat Datang!
                            </div>
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="hero text-white hero-bg-image" data-background="<?= base_url('assets/') ?>img/cover_profile.jpg">
                        <div class="hero-inner">
                            <div class="row">
                                <div class="col-sm-1 mr-3">
                                    <figure class="avatar mr-2 avatar-xl">
                                        <img src="<?= base_url('assets/img/profile/') . $user['foto'] ?>">
                                        <i class="avatar-presence online"></i>
                                    </figure>
                                </div>
                                <div class="col-sm-6">
                                    <h2>Selamat Datang, <?= $user['nama'] ?> !</h2>
                                    <p class="lead">Nama Pelatihan : <?= $pelatihan['judul_program']; ?></p>
                                    <p class="lead">Status : 
                                    <?php if($pelatihan['status_pelatihan']) : ?>    
                                        <span class="badge badge-primary text-small"> Diterima </span>
                                        <?php else: ?>
                                        <span class="badge badge-success text-small"> Menunggu Konfirmasi </span>
                                    <?php endif; ?>
                                    </p>
                                        
                                    <p class="lead">Nomor Registrasi : <?= $pelatihan['no_pelatihan']; ?></p>
                                    <div class="mt-4">
                                        <a href="<?= site_url('peserta/ubah_profil'); ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>Update Profile</a>
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
                                <dd class="col-sm-9"><?= $user['no_ktp'] ?></dd>

                                <dt class="col-sm-3">Jenis Kelamin</dt>
                                <dd class="col-sm-9">
                                    <p><?= $user['jk'] ?></p>
                                </dd>

                                <dt class="col-sm-3">Tanggal Lahir</dt>
                                <dd class="col-sm-9">
                                    <p><?= tgl_indo($user['tgl_lahir']); ?> </p>
                                </dd>
                                <p class="col-sm-12"><strong>Akun ini dibuat sejak :</strong> <?= date('d F Y', $user['date_created']); ?></p>
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
                                <dd class="col-sm-9"><?= $user['email'] ?></dd>

                                <dt class="col-sm-3">No. HP</dt>
                                <dd class="col-sm-9">
                                    <p><?= $user['no_hp'] ?></p>
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
                                <dt class="col-sm-6"><?= $user['alamat']; ?></dt>
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