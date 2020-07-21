<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <a href="<?= site_url('pelatihan/program_tambah') ?>" class="btn btn-primary btn-lg mb-2">Tambah Program</a>
      <a href="<?= site_url('admin/cetak_pelatihan') ?>" target="_blank" class="btn btn-danger btn-lg mb-2"><i class="fas fa-print"></i> Print Pdf</a>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tableProgram">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul Pelatihan</th>
                      <th>Kode Pelatihan</th>
                      <th>Kategori Peserta</th>
                      <th>Lama Pelaksanaan</th>
                      <th>Batas Kuota</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- looping data program pelatihan -->
                    <?php foreach ($program as $key => $pg) : ?>
                      <tr>
                        <td><?= $key + 1; ?></td>
                        <td>
                          <a href="<?= site_url('pelatihan/program_detail/' . $pg['id_program']); ?>"><?= $pg['judul_program']; ?></a>
                        </td>
                        <td><?= $pg['kode_program']; ?></td>
                        <td><?= $pg['nama_kategori']; ?></td>
                        <td><?= $pg['lama_pelaksanaan']; ?> hari</td>
                        <td><?= $pg['batas_kuota']; ?> orang</td>
                        <td width="13%">
                          <a href="<?= site_url('pelatihan/program_detail/' . $pg['id_program']); ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detail Program"><i class="fas fa-eye"></i></a>
                          <a href="<?= site_url('pelatihan/program_edit/' . $pg['id_program']); ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Program"><i class="fas fa-edit"></i></a>
                          <a href="<?= site_url('pelatihan/program_hapus/' . $pg['id_program']) ?>" class="btn btn-danger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus Program"><i class="fas fa-trash"></i></a>
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