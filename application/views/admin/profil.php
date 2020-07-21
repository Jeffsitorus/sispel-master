<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profil Administrator</h1>
    </div>
    <div class="row">
      <div class="col-12 col-sm-12 col-lg-7">
        <div class="card author-box card-primary">
          <div class="card-body">
            <div class="author-box-left">
              <img alt="image" src="<?= base_url('assets/img/profile/') . $user['foto'] ?>" class="rounded-circle author-box-picture">
              <div class="clearfix"></div>
              <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a>
            </div>
            <div class="author-box-details">
              <div class="author-box-name">
                <a href="#"><?= $user['nama']; ?></a>
              </div>
              <div class="author-box-job">Admin</div>
              <div class="author-box-description">
                <p>Email : <?= $user['email'] ?></p>
              </div>
              <div class="mb-2 mt-3">
                <div class="text-small font-weight-bold">Follow <?= $user['nama'] ?> On</div>
              </div>
              <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="btn btn-social-icon mr-1 btn-github">
                <i class="fab fa-github"></i>
              </a>
              <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>