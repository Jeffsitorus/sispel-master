<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($breadcrumbs); ?></h1>
    </div>
    <div class="section-body">
      <!-- button add info -->
      <a href="<?= site_url('info/info_add'); ?>" class="btn btn-primary btn-lg mb-2">Tambahkan Info</a>
      <a href="<?= site_url('info/tampil_info'); ?>" class="btn btn-info btn-lg ml-2 mb-2"><i class="fas fa-eye"></i>Tampil Info</a>
      <a href="<?= site_url('admin/cetak_info'); ?>" class="btn btn-danger btn-lg ml-2 mb-2" target="_blank"><i class="fas fa-eye"></i>Print to Pdf</a>
      <!-- memanggil session flashdata -->
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
      <!-- content  data info-->
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableInfo">
              <thead class="bg-light">
                <tr>
                  <th>No</th>
                  <th>Kategori Info</th>
                  <th>Judul Info</th>
                  <th>Tanggal Aktif</th>
                  <th>Batas Aktif</th>
                  <th>Status</th>
                  <th>Edit Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- looping data info -->
                <?php foreach ($info as $key => $in) : ?>
                  <tr>
                    <td scope="row"><?= $key + 1; ?></td>
                    <td><?= $in['keterangan']; ?></td>
                    <td><?= ucwords($in['judul_info']); ?></td>
                    <td><?= $in['tgl_mulai']; ?></td>
                    <td><?= $in['tgl_selesai']; ?></td>
                    <td>
                      <?php if ($in['status']) : ?>
                        <span class="badge badge-primary">Publish</span>
                      <?php else : ?>
                        <span class="badge badge-danger">Nonaktif</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($in['status'] == "0") : ?>
                        <a href="#" class="badge badge-info badge-pill" data-toggle="tooltip" data-placement="top" title="Edit Status" onclick="event.preventDefault(); if(confirm('Yakin ubah status info?')){
                        document.getElementById('update-<?= $in['id'] ?>').submit(); 
                       }"><i class="fas fa-pen"></i></a>
                        <form action="<?= site_url('info/editStatus/' . $in['id']); ?>" id="update-<?= $in['id']; ?>" method="post" style="display: none;"></form>
                      <?php else : ?>
                        <a href="#" class="badge badge-warning badge-pill" data-toggle="tooltip" data-placement="top" title="Edit Status" onclick="event.preventDefault(); if(confirm('Yakin nonaktifkan info?')){
                        document.getElementById('edit-<?= $in['id'] ?>').submit(); 
                       }"><i class="fas fa-pen"></i></a>
                        <form action="<?= site_url('info/nonaktifkan/' . $in['id']); ?>" id="edit-<?= $in['id']; ?>" method="post" style="display: none;"></form>
                      <?php endif; ?>
                    </td>
                    <td width="10%">
                      <a href="<?= site_url('info/info_edit/' . $in['id']); ?>" class="btn btn-primary btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Update info"><i class="fas fa-edit"></i></a>
                      <a href="<?= site_url('info/info_delete/' . $in['id']); ?>" class="btn btn-danger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus info"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <!-- end-looping -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>