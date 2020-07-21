<?php foreach($jadwal as $jdw) : ?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail Pelatihan </h1>
    </div>
    <div class="section-body">
      <div class="text-right">
        <a href="<?= site_url('user/pilih_pelatihan') ?>" class="btn btn-info btn-lg mb-2"> <i class="fas fa-arrow-left"></i> Kembali</a>
      </div>
      <div class="card">
        <div class="card-body">
          <!-- content data pelatihan -->
          <div class="row">
            <div class="col-12">
            <h2>Deskripsi Pelatihan</h2>
            <h6><?= $jdw['judul_program']; ?></h6>
            <span class="text-small font-weight-bold">Tanggal Pendaftaran : <?= $jdw['tgl_pendaftaran'] . ' s/d ' . $jdw['tutup_pendaftaran']; ?></span>
            <p class="text-small font-weight-bold">Tanggal Pelaksanaan : <?= $jdw['tgl_pelaksanaan'] . ' s/d ' . $jdw['selesai_pelaksanaan']; ?></->
            <?= $jdw['deskripsi']; ?>
            </div>
          </div>
          <a href="<?= site_url('user/daftarPelatihan/'. $jdw['id_jadwal']); ?>" class="btn btn-primary btn-lg">Daftar Pelatihan</a>
          <div class="card-footer mt-4 bg-whitesmoke">
            SISPEL | Kelompok 1
          </div>
        </div>
      </div>
  </section>
</div>
<?php endforeach; ?>