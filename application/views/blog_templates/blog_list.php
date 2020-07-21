 <!-- Job List Area Start -->
 <div class="job-listing-area pt-120 pb-120">
     <div class="container">
         <div class="row">
             <!-- Left content -->
             <div class="col-xl-3 col-lg-3 col-md-4">
                 <div class="row">
                     <div class="col-12">
                         <div class="small-section-tittle2 mb-45">
                             <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                     <path fill-rule="evenodd" fill="rgb(27, 207, 107)" d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                 </svg>
                             </div>
                             <h4>Filter Jobs</h4>
                         </div>
                     </div>
                 </div>
                 <!-- Job Category Listing start -->
                 <div class="job-category-listing mb-50">
                     <!-- single one -->
                     <div class="single-listing">
                         <div class="small-section-tittle2">
                             <h4>Kategori Pelatihan</h4>
                         </div>
                         <!-- Select job items start -->
                         <div class="select-job-items2">
                             <select name="kategori" id="kategori" class="mb-4">
                                 <option>Semua Kategori</option>
                                 <?php foreach ($kategori as $kt) : ?>
                                     <option value="<?= $kt['keterangan'] ?>"><?= $kt['keterangan'] ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>
                     <!-- single two -->
                     <div class="single-listing">
                         <div class="small-section-tittle2">
                             <h4>Lokasi Pelatihan</h4>
                         </div>
                         <!-- Select job items start -->
                         <div class="select-job-items2">
                             <select name="select">
                                 <option>Semua Lokasi</option>
                                 <option value="Online">Online</option>
                                 <option value="Karawang">Karawang</option>
                             </select>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Right content -->
             <div class="col-xl-9 col-lg-9 col-md-8">
                 <!-- Featured_job_start -->
                 <section class="featured-job-area">
                     <div class="container">
                         <!-- Count of Job list Start -->
                         <div class="row">
                             <div class="col-lg-12">
                                 <?php
                                    if (empty($program)) : ?>
                                     <div class="alert alert-danger" role="alert">
                                         Data tidak ditemukan!
                                     </div>
                                 <?php endif; ?>
                                 <div class="count-job mb-35">
                                     <span><?= $total_rows; ?> Pelatihan tersedia</span>
                                     <nav class="navbar navbar-light">
                                         <form class="form-inline" action="<?= base_url('blog') ?>" method="get">
                                             <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Search" aria-label="Search" autofocus>
                                             <input class="btn btn-outline-primary my-2 my-sm-0" name="submit" value="Search" type="submit"></input>
                                         </form>
                                     </nav>
                                 </div>
                             </div>
                         </div>
                         <!-- Count of Job list End -->
                         <?php foreach ($program as $pg) : ?>
                             <!-- single-job-content -->
                             <div class="single-job-items mb-30">
                                 <div class="job-items">
                                     <div class="company-img">
                                         <a href="#"><img src="<?= base_url('assets/img/kemnaker.png') ?>" alt="logo"></a>
                                     </div>
                                     <div class="job-tittle job-tittle2">
                                         <a href="#">
                                             <h4><?= $pg['judul_program']; ?></h4>
                                         </a>
                                         <ul>
                                             <li>BBPLK</li>
                                             <li><i class="fas fa-map-marker-alt"></i><?= $pg['lokasi']; ?></li>
                                             <li>Kuota : <?= $pg['batas_kuota'] ?></li>
                                             <li>
                                                 <span class="badge badge-success text-light"><?= $pg['hari'] ?></span>
                                             </li>
                                         </ul>
                                         <ul>
                                             <li>Pendaftaran :</li>
                                             <li><?= $pg['tgl_pendaftaran'] ?> - <?= $pg['tutup_pendaftaran'] ?></li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="items-link items-link2 f-right">
                                     <a href="<?= base_url('blog/blog_detail/') . $pg['id_jadwal'] . '/' ?>">Detail</a>
                                     <?php if ($pg['status'] == 0) : ?>
                                         <span class="badge badge-pill badge-danger text-light">Belum dibuka</span>
                                     <?php endif; ?>
                                     <?php if ($pg['status'] == 1) : ?>
                                         <span class="badge badge-pill badge-success text-light">Dibuka</span>
                                     <?php endif; ?>
                                 </div>
                             </div>
                         <?php endforeach; ?>
                     </div>
                 </section>
             </div>
         </div>
     </div>
 </div>
 <!-- Job List Area End -->
 <!--Pagination Start  -->
 <div class="pagination-area pb-115 text-center">
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="single-wrap d-flex justify-content-center">
                     <?= $this->pagination->create_links(); ?>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--Pagination End  -->