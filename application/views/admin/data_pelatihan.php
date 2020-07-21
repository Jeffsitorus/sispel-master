<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $judul ?></h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="flash-data" data-flashdata=<?= $this->session->flashdata('success'); ?>></div>
        <a href="<?= site_url('admin/print_pelatihan'); ?>" target="_blank" class="btn btn-danger btn-lg mb-2"><i class="fas fa-print"></i> Print Pdf</a>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="tablePeserta">
                <thead>
                  <tr>
                    <th class="text-center">
                      <i class="fas fa-th"></i>
                    </th>
                    <th>No Pelatihan</th>
                    <th>Nama Peserta</th>
                    <th>Email</th>
                    <th>Program Yang Diikuti</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($pelatihan as $key => $pel) : ?>
                    <tr>
                      <td><?= $key+1; ?></td>
                      <td><?= $pel['no_pelatihan']; ?></td>
                      <td><?= $pel['nama']; ?></td>
                      <td><?= $pel['email']; ?></td>
                      <td><?= $pel['judul_program']; ?></td>
                      <td><?= $pel['tgl_pendaftaran']; ?></td>
                      <td>
                        <?php if($pel['status_pelatihan'] == 1) : ?>
                          <span class="text-success">Diterima</span>
                        <?php else: ?>
                          <span class="text-primary">Menunggu Konfirmasi</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('status-<?= $pel['no_pelatihan']; ?>').submit();" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form style="display:none;" action="<?= site_url('admin/ubah_status/'. $pel['no_pelatihan']); ?>" id="status-<?= $pel['no_pelatihan']; ?>" method="post"></form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>