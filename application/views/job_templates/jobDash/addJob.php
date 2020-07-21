 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Editor</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Forms</a></div>
              <div class="breadcrumb-item">Editor</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Editor</h2>
            <p class="section-lead">WYSIWYG editor and code editor.</p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Simple Summernote</h4>
                  </div>
                  <?= form_open_multipart('job/publishLowongan'); ?>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Lowongan</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" placeholder="ex:Lowongan Indihome" name="lowongan" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="kategori" placeholder="TI,AP,PB,dll" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                      <div class="col-sm-3">
                        <input type="text" name="lokasi" class="form-control">
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gaji</label>
                      <div class="col-sm-3">
                        <input type="text" name="gaji" placeholder="Rp.xxx - Rp.xxx" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Pekerjaan</label>
                      <div class="col-sm-4">
                          <select name="jenis" class="form-control selectric">
                            <option>--- PILIH ---</option>
                            <option value="Fulltime">Fulltime</option>
                          <option value="Part-time">Part-time</option>
                        </select>
                      </div>
                    </div>


                    <div class="form-group row mb-4">
                     <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cover Post</label>
                        <div id="image-preview" class="image-preview">
                              <img src="<?= base_url('assets/img/coverLowongan/').$user['cover_img']; ?>" width="90%" alt="">
                        </div>
                        <div class="col-sm-4">
                            <div class="custom-file mt-2">
                                <input type="file" name="foto" class="custom-file-input pt-3" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea name="content" id="editor1"></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Publish</button>
                      </div>
                    </div>  
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>