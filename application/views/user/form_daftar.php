<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Pelatihan</h1>
    </div>
    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <div class="row mt-4">
            <div class="col-12 col-lg-8 offset-lg-2">
              <div class="wizard-steps">
                <div class="wizard-step wizard-step-active">
                  <div class="wizard-step-icon">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="wizard-step-label">
                    Data Pribadi
                  </div>
                </div>
                <div class="wizard-step wizard-step-active">
                  <div class="wizard-step-icon">
                    <i class="fas fa-box-open"></i>
                  </div>
                  <div class="wizard-step-label">
                    Pilih Pelatihan
                  </div>
                </div>
                <div class="wizard-step wizard-step-active">
                  <div class="wizard-step-icon">
                    <i class="fas fa-server"></i>
                  </div>
                  <div class="wizard-step-label">
                    Server Information
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- content  -->
          <div class="table-responsive mt-5">
            <table class="table table-inverse">
              <thead>
                <tr>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Pelatihan yang Dipilih</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $user['nama']; ?></td>
                  <td><?= $user['jk']; ?></td>
                  <td><?= $user['email']; ?></td>
                  <td><?= $user['alamat']; ?></td>
                  <?php foreach($jadwal as $jdl): ?>
                  <td><?= $jdl['judul_program']; ?></td>
                  <?php endforeach; ?>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-12 text-right">
            <?php foreach($jadwal as $jdw) : ?>
              <form action="<?= site_url('user/selesai_daftar'); ?>" method="post">
                <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                <input type="hidden" name="id_jadwal" value="<?= $jdw['id_jadwal']; ?>">
                <input type="hidden" name="tgl_pendaftaran" value="<?= date('Y-m-d'); ?>">
                <input type="hidden" name="program_id" value="<?= $jdw['program_id']; ?>">
                <div class="form-group">
                  <input type="submit" value="Selesai Daftar" class="btn btn-lg btn-primary">
                </div>
              </form>
            <?php endforeach; ?>
            </div>
          </div>
          <div class="card-footer bg-whitesmoke">
            SISPEL | Kelompok 1
          </div>
        </div>
      </div>
  </section>
</div>