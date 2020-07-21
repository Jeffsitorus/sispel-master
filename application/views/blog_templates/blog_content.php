<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="<?= base_url('assets') ?>/img/cover_blog.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 logo-cover">
                        <img src="<?= base_url('assets/img/kemnaker_new.png') ?>" width="100%" class="rounded float-left">
                    </div>
                    <div class="col-sm-5 mr-5">
                        <div class="hero-cap text-left">
                            <h3 class="text-light"><?= $program['judul_program'] ?></h3>
                            <p>
                                <?php if ($program['status'] == 0) : ?>
                                    <span class="badge badge-danger text-light">Belum dibuka</span>
                                <?php endif; ?>
                                <?php if ($program['status'] == 1) : ?>
                                    <span class="badge badge-success text-light">Dibuka</span>
                                <?php endif; ?>
                            </p>
                            <p class="text-light">Penyelenggara : <span class="badge badge-primary">Kemnaker</span></p>
                            <p class="text-light">Program Pelatihan : <span class="badge badge-info"><?= $program['judul_program'] ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="<?= base_url('assets') ?>/img/icon/job-list1.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4><?= $program['judul_program'] ?></h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i><?= $program['lokasi'] ?></li>
                                    <li>Kuota : <?= $program['batas_kuota'] ?></li>
                                    <li>
                                        <?php if ($program['status'] == 0) : ?>
                                            <span class="badge badge-danger text-light">Belum dibuka</span>
                                        <?php endif; ?>
                                        <?php if ($program['status'] == 1) : ?>
                                            <span class="badge badge-success text-light">Dibuka</span>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details single-job-items">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Deskripsi Pelatihan</h4>
                            </div>
                            <p><?= $program['deskripsi'] ?></p>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Detail Pelatihan</h4>
                        </div>
                        <ul>
                            <li>Pelatihan Dimulai : <span><?= tgl_indo($program['tgl_pelaksanaan']) ?></span></li>
                            <li>Lokasi : <span><?= $program['lokasi'] ?></span></li>
                            <li>Jadwal Pelatihan : <span class="badge badge-success badge-pill"><?= $program['hari'] ?></span></li>
                            <li>Lama Kegiatan : <span><?= $program['lama_pelaksanaan'] ?> hari</span></li>
                            <li>Batas Kuota : <span><?= $program['batas_kuota'] ?> Peserta</span></li>
                        </ul>
                        <a href="<?= base_url('blog/daftar') ?>" class="btn btn-light btn-lg">
                            Daftar
                        </a>
                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Informasi Penyelenggara</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
</main>