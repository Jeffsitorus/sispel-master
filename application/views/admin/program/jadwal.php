<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <a href="<?= site_url('pelatihan/jadwal_tambah') ?>" class="btn btn-primary btn-lg mb-2">Tambah Jadwal</a>
      <a href="<?= site_url('pelatihan/tampil_jadwal') ?>" class="btn btn-info btn-lg mb-2"><i class="fas fa-eye"></i> Tampilkan Jadwal</a>
      <a href="<?= site_url('admin/cetak_jadwal') ?>" class="btn btn-danger btn-lg mb-2" target="_blank"><i class="fas fa-print"></i> Print to Pdf</a>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tableJadwal">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Program Pelatihan</th>
                      <th>Tanggal Pendaftaran</th>
                      <th>Tanggal Pelaksanaan</th>
                      <th>Lokasi</th>
                      <th>Hari</th>
                      <th>Status</th>
                      <!-- <th>Edit</th> -->
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- looping data kategori peserta -->
                    <?php foreach ($jadwal as $key => $jwl) : ?>
                      <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $jwl['judul_program']; ?></td>
                        <td><?= tgl_indo($jwl['tgl_pendaftaran']) . ' s/d ' . tgl_indo($jwl['tutup_pendaftaran']); ?> </td>
                        <td><?= tgl_indo($jwl['tgl_pelaksanaan']) . ' s/d ' . tgl_indo($jwl['selesai_pelaksanaan']); ?></td>
                        <td><?= $jwl['lokasi']; ?></td>
                        <td><?= $jwl['hari']; ?></td>
                        <td>
                          <?php if ($jwl['status']) : ?>
                            <span class="badge badge-primary">Aktif</span>
                          <?php else : ?>
                            <span class="badge badge-danger">Nonaktif</span>
                          <?php endif; ?>
                        </td>
                        <!-- <td>
                          <?php if ($jwl['status'] == 0) : ?>
                            <a href="#" class="badge badge-info badge-pill badge-sm" data-toggle="tooltip" data-placement="top" title="Ubah Status" onclick="event.preventDefault(); document.getElementById('update-<?= $jwl['id_jadwal']; ?>').submit();">
                              <i class="fas fa-pen"></i>
                            </a>
                            <form action="<?= site_url('pelatihan/jadwal_ubah/' . $jwl['id_jadwal']); ?>" id="update-<?= $jwl['id_jadwal']; ?>"></form>
                          <?php else : ?>
                            <a href="#" class="badge badge-warning badge-pill badge-sm" data-toggle="tooltip" data-placement="top" title="Nonaktifkan" onclick="event.preventDefault(); document.getElementById('nonaktifkan-<?= $jwl['id_jadwal']; ?>').submit();">
                              <i class="fas fa-pen"></i>
                            </a>
                            <form action="<?= site_url('pelatihan/jadwal_nonaktif/' . $jwl['id_jadwal']); ?>" id="nonaktifkan-<?= $jwl['id_jadwal']; ?>"></form>
                          <?php endif; ?>
                        </td> -->
                        <td width="10%">
                          <a href="<?= site_url('pelatihan/jadwal_edit/' . $jwl['id_jadwal']); ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Jadwal"><i class="fas fa-edit"></i></a>
                          <a href="<?= site_url('pelatihan/jadwal_hapus/' . $jwl['id_jadwal']) ?>" class="btn btn-danger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus Jadwal"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    <!-- end -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>