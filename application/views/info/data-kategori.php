<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= ucwords($title); ?></h1>
    </div>
    <div class="section-body">
      <!-- button add kategori -->
      <div class="row">
        <div class="col-lg-6">
          <button type="button" class="btn btn-primary btn-lg mb-2" data-toggle="modal" data-target="#addKategori">
            Tambah Kategori
          </button>
        </div>
        <!-- memanggil session flashdata -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
      </div>
      <!-- content  data kategori-->
      <div class="card">
        <div class="card-header">
          <h4>Show/Hide</h4>
          <div class="card-header-action">
            <a href="#" data-collapse="#mycard-collapse" class="btn btn-info btn-icon"><i class="fas fa-minus"></i></a>
          </div>
        </div>
        <div class="collapse show" id="mycard-collapse">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="tableKategoriInfo">
                <thead class="bg-light">
                  <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Diinputkan</th>
                    <th>Operations</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- looping data kategori -->
                  <?php foreach ($kategori as $key => $k) : ?>
                    <tr>
                      <td scope="row"><?= $key + 1; ?></td>
                      <td><?= $k['keterangan']; ?></td>
                      <td><?= $k['created_at']; ?></td>
                      <td width="23%">
                        <a href="<?= site_url('info/kategori_edit/' . $k['id']); ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Update</a>
                        <a href="<?= site_url('info/kategori_delete/' . $k['id']); ?>" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i> Delete</a>
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
    </div>
  </section>
</div>
<!-- memanggil modal add kategori -->
<?php include_once('create-kategori.php'); ?>