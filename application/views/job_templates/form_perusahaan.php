      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Lengkapi Data Perusahaan</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">FORM</h2>
            <p class="section-lead">Silahkan lengkapi form dibawah Untuk lengkapi data</p>
            <div class="card">
              <div class="card-header">
                <h4>Example Card</h4>
              </div>
              <div class="card-body">
                    <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="far fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                              Data Perusahaan
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?= form_open_multipart('job/addPerusahaan'); ?>
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="validationTooltip01">Nama Perusahaan</label>
                        <input type="hidden" name="id_perusahaan" value="<?= $user['id_perusahaan']; ?>">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                        <?= form_error('nama'); ?>
                      </div>
                      <div class="col-sm-6">
                        <label for="validationTooltip01">Nomor Telepon</label>
                        <input type="text" class="form-control" name="notelp" placeholder="12 Digit">
                        <?= form_error('nik'); ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="validationTooltip01">Deskripsi Perusahaan</label>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Beritahu kami tentang perusahaan anda">
                        <?= form_error('alamat'); ?>
                      </div>
                      <div class="col-sm-6">
                        <label for="validationTooltip01">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                        <?= form_error('alamat'); ?>
                      </div>

                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="validationTooltip01">Alamat Website</label>
                        <input type="text" class="form-control" name="website" placeholder="www.yourwebsite.com">
                        <?= form_error('website'); ?>
                      </div>
                      <div class="col-sm-6">
                        <label for="validationTooltip01">Logo Perusahaan</label>
                        <div id="image-preview" class="image-preview">
                              <img src="<?= base_url('assets/img/profile/').$user['foto']; ?>" width="90%" alt="">
                            </div>
                            <div class="custom-file mt-2">
                            <input type="file" name="foto" class="custom-file-input pt-3" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      <button type="submit" class="btn btn-md btn-primary mt-4">Submit</button>
                      </>
                    </div>
                  </div>
                  <div class="card-footer bg-whitesmoke">
                SISPEL | Kelompok 1
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
