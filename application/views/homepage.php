<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1>Upgrade Skill Kamu Sekarang !!</h1>
        <h2>Mari kita rebahan sambil Upgrade Skill agar rebahan mu terlihat menjadi lebih produktif</h2>
        <div class="d-flex">
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
          <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a> -->
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img">
        <img src="<?= base_url('assets/enno') ?>/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services mt-3">
    <div class="container">
      <div class="row">
        <?php foreach ($pelatihan as $p) : ?>
          <div class="col-sm-4 mb-4">
            <div class="icon-box">
              <div class="icon"><i class="icofont-computer"></i></div>
              <h4 class="title"><a href=""><?= $p['keterangan'] ?></a></h4>
              <p class="description"><?= $p['deskripsi_kategori'] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
  </section><!-- End Featured Services Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row">
        <div class="col-lg-6">
          <img src="<?= base_url('assets/enno') ?>/img/about.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content">
          <h3>Apa itu SILOKER ?</h3>
          <p class="font-italic">
            SILOKER adalah sebuah platform web yang menyediakan berbagai macam pelatihan secara gratis, kamu dapat mendaftar pelatihan sekaligus
            mencari lowongan pekerjaan yang disediakan oleh berbagai perusahaan yang berkerja sama dengan kami. Apa saja benefit nya?
          </p>
          <ul>
            <li><i class="icofont-check-circled"></i> 100% Gratis</li>
            <li><i class="icofont-check-circled"></i> Diajarkan oleh mentor professional</li>
            <li><i class="icofont-check-circled"></i> Mendapatkan sertifikat kompetensi</li>
            <li><i class="icofont-check-circled"></i> Berkerja sama dengan perusahaan ternama</li>
          </ul>
          <p>
            Tak cuma diatas saja, untuk info lebih lanjut yuk kepoin web SILOKER
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">232</span>
          <p>Clients</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">521</span>
          <p>Projects</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">1,463</span>
          <p>Hours Of Support</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">15</span>
          <p>Hard Workers</p>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container">
      <div class="section-title">
        <span>Pelatihan</span>
        <h2>Pelatihan</h2>
        <p>Berikut adalah Pelatihan yang tersedia</p>
      </div>

      <div class="row">
        <?php foreach ($program as $pr) : ?>
          <div class="col-12 col-md-4 col-lg-4">
            <article class="article article-style-c">
              <div class="article-header">
                <img class="article-image" src="<?= base_url('assets/upload/program/') . $pr['gambar'] ?>">
                </img>
              </div>
              <div class="article-details">
                <div class="article-category"><a href="#">Pelatihan</a>
                  <div class="bullet"></div> <a href="#">Online</a>
                </div>
                <div class="article-title">
                  <h2><a href="#"><?= $pr['judul_program']; ?></a></h2>
                  <span><?= $pr['keterangan']; ?></span>
                </div>
                <div class="article-user">
                  <img alt="image" src="<?= base_url('assets/') ?>/img/profile/default.jpg">
                  <div class="article-user-details">
                    <div class="user-detail-name">
                      <a href="javascript:void(0);">Hasan Basri</a>
                    </div>
                    <div class="text-job">Web Developer</div>
                  </div>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      </div>

      <section class="cto">
        <div class="container">
          <div class="text-center">
            <h3>List Pelatihan</h3>
            <p>Untuk selengkapnya, kamu bisa menuju ke halaman pelatihan</p>
            <a class="cta-btn" href="<?= base_url('blog') ?>">List Pelatihan</a>
          </div>
        </div>
      </section><!-- End Cta Section -->


      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials section-bg">
        <div class="container">

          <div class="section-title">
            <span>Alumni</span>
            <h2>Alumni</h2>
            <p>Ini kata mereka tentang SILOKER</p>
          </div>

          <div class="owl-carousel testimonials-carousel">

            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Materi yang disampaikan sangat baik, berkat mengikuti pelatihan ini saya sadar bahwa diri saya berada dijalan ninja yang benar.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="<?= base_url('assets') ?>/img/testi/naruto.png" class="testimonial-img" alt="">
              <h3>Uzumaki Naruto</h3>
              <h4>Hokage di Konoha </h4>
            </div>

            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Berkat SILOKER akhirnya gw bisa hack akun si Fizi kamvret, makasih SILOKER (like)
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="<?= base_url('assets') ?>/img/testi/upin.jpg" class="testimonial-img" alt="">
              <h3>Upin dan Ipin</h3>
              <h4>Gangster Durian Runtuh</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                birkit pilitihin ini siyi minjidi sioring wib divilipir, tirimikisih sispil (like)
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="<?= base_url('assets') ?>/img/testi/shitpost.jpg" class="testimonial-img" alt="">
              <h3>Cringe People</h3>
              <h4>Elite Shitposter</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Berkat SILOKER saya bisa hack GARENA biar bisa topup FF Unlimited, tengkyu SILOKER
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="<?= base_url('assets') ?>/img/testi/ff.jpg" class="testimonial-img" alt="">
              <h3>Rizky C'boedak FriFayer</h3>
              <h4>OP Warnet</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Berkat SILOKER watashi bisa menuju jalan isekai dengan mudah, arigatou gozaimasu SILOKER watashi jadi bisa ketemu waifu isekai (suki)
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="<?= base_url('assets') ?>/img/testi/kirito.png" class="testimonial-img" alt="">
              <h3>Kirito Sang Pendekar Pedang Hitam</h3>
              <h4>Main Character</h4>
            </div>

          </div>

        </div>
      </section><!-- End Testimonials Section -->

      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta">
        <div class="container">

          <div class="text-center">
            <h3>Tunggu Apa Lagi?</h3>
            <p>Jika kalian tertarik untuk ikut Pelatihan di SILOKER, silahkan kalian bisa daftar pada halaman diatas.</p>
            <a class="cta-btn" href="<?= site_url('AuthUser/buatAkun') ?>">Daftar</a>
          </div>

        </div>
      </section><!-- End Cta Section -->

      <!-- ======= Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container">

          <div class="section-title">
            <span>Team</span>
            <h2>Team</h2>
            <p>Kami adalah perkumpulan mahasiswa generasi corona</p>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="<?= base_url('assets/enno') ?>/img/team/team-1.jpg" alt="">
                <h4>Eki Kun</h4>
                <span>Founder SILOKER</span>
                <p>
                  Founder SILOKER, seorang mahasiswa tanpa nama di Universitas Wuhan
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="<?= base_url('assets/enno') ?>/img/team/team-2.jpg" alt="">
                <h4>Efa Chan</h4>
                <span>Instructur</span>
                <p>
                  Instructor di SILOKER
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="<?= base_url('assets/enno') ?>/img/team/team-2.jpg" alt="">
                <h4>Intan Ayu</h4>
                <span>Instructur</span>
                <p>
                  Instructor di SILOKER (saya galak kalau lagi ngajar)
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="<?= base_url('assets/enno') ?>/img/team/aku.jpg" alt="image">
                <h4>Jefri H Sitorus</h4>
                <span>CTO</span>
                <p>

                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="<?= base_url('assets/enno'); ?>/img/team/enjun.jpg" alt="">
                <h4>Fiore</h4>
                <span>Numpang Nama</span>
                <p>
                  Ketika termux ku berjalan disitu akun mu akan menghilang.
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <img src="<?= base_url('assets/enno'); ?>/img/team/enjun.jpg" alt="">
                <h4>Enjun</h4>
                <span>Proffesional Shitposter</span>
                <p>
                  Saya jago buat meme
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Team Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container">

          <div class="section-title">
            <span>Contact</span>
            <h2>Contact</h2>
            <p>Hubungi Kami.</p>
          </div>

          <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
              <div class="info">
                <div class="address">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>
                  <p>Cikampek,Jawa Barat . Indonesia</p>
                </div>

                <div class="email">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>kami.SILOKER@gmail.com</p>
                </div>

                <div class="phone">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <p>0858523121</p>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15861.797444710803!2d107.3356456!3d-6.3357912!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbcd8ff1be1da9c3b!2sDisnakertrans%20Karawang!5e0!3m2!1sen!2sid!4v1591525090172!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Your Email</label>
                    <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <label for="name">Message</label>
                  <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->

</main><!-- End #main -->