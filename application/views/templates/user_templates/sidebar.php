<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">SISPEL</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SP</a>
          </div>
          <ul class="sidebar-menu">
          <!-- Query Menu -->
          <?php
          $role_id =  $this->session->userdata('role_id');
          $queryMenu = "  SELECT `user_menu`.`id`,`menu`
                          FROM `user_menu` JOIN `user_access_menu`
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                          WHERE `user_access_menu`.`id_role` = '$role_id'
                          ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
          $menu = $this->db->query($queryMenu)->result_array();
          ?>
          

          <!-- Looping Menu -->
          <?php 
            foreach($menu as $m) : ?>
              <li class="active menu-header"><?= $m['menu']; ?></li>

              <!-- sub menu -->
              <?php
              $menuID = $m['id'];
               $queryMenu = "  SELECT *
                               FROM `user_submenu`
                               WHERE `menu_id` = '$menuID'
                               AND `is_active` = 1
                        ";
              $subMenu = $this->db->query($queryMenu)->result_array();
              ?>

            <?php foreach($subMenu as $sm) : ?>
            <!-- Cek menu yang sedang aktif berdasarkan judul menu -->
            <?php
            if ($judul == $sm['judul'])
            :?>
              <li class="nav-item active">
            <?php else: ?>
              <li class="nav-item">
            <?php endif; ?>
            <!-- END cek menu -->

                <!-- url -->
                <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                <!-- icon -->
                <i class="<?= $sm['icon']; ?>"></i>
                <!-- judul -->
                <span><?= $sm['judul']; ?></span></a>
              </li>
            <?php endforeach; ?>

            <?php endforeach; ?>
              <li class="nav-item">
                <a href="<?= base_url('AuthUser')?>/logout" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
              </li>
            </ul>

        </aside>
      </div>