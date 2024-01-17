<!-- Sidebar -->
<style>
  a {
    color: #006d55;
  }

  .sidebar .nav-item .collapse .collapse-inner .collapse-item.active,
  .sidebar .nav-item .collapsing .collapse-inner .collapse-item.active {
    color: #006d55;
  }
</style>
<ul class="navbar-nav sidebar accordion" style="background-color: #c7c7c7;" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-text mx-3">Centro Futsal</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item <?php echo $this->uri->segment(1) == 'pemohon' ? 'active' : '' ?>">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-book"></i>
      <span>Kelola</span>
    </a>
    <div id="collapseTwo" class="collapse <?php echo $this->uri->segment(1) == 'kelola' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item <?php echo $this->uri->segment(2) == 'lapangan' ? 'active' : '' ?>" href="<?php echo base_url('kelola/lapangan/index'); ?>">Lapangan</a>
        <a class="collapse-item <?php echo $this->uri->segment(2) == 'jadwal' ? 'active' : '' ?>" href="<?php echo base_url('kelola/jadwal/index'); ?>">Jadwal</a>
        <a class="collapse-item <?php echo $this->uri->segment(2) == 'penyewaan' ? 'active' : '' ?>" href="<?php echo base_url('kelola/penyewaan/index'); ?>">Penyewaan</a>
      </div>
    </div>
  </li>

  <!-- Query menu -->
  <?php
  $role_id = $this->session->userdata('role_id');
  $queryMenu = "SELECT user_menu.id, menu
                      FROM user_menu JOIN user_access_menu
                      ON user_menu.id = user_access_menu.menu_id
                      WHERE user_access_menu.role_id = $role_id
                      ORDER BY user_access_menu.menu_id ASC ";
  $menu = $this->db->query($queryMenu)->result_array();
  ?>

  <!-- Looping Menu -->
  <?php foreach ($menu as $m) : ?>
    <div class="sidebar-heading">
      <?= $m['menu']; ?>
    </div>

    <!-- Siapkan sublink sesuai menu -->
    <?php
    $menuId = $m['id'];
    $querySubMenu = "SELECT *
                                  FROM user_sub_menu
                                  WHERE menu_id = $menuId
                                  AND is_active = 1 ";
    $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>

    <?php foreach ($subMenu as $sm) : ?>
      <!-- Nav Item - Dashboard -->
      <?php if ($title == $sm['title']) : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?php echo base_url($sm['url']); ?>">
          <i class="<?php echo $sm['icon']; ?>"></i>
          <span><?php echo $sm['title']; ?></span></a>
        </li>
      <?php endforeach; ?>

      <!-- Divider -->
      <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>

</ul>
<!-- End of Sidebar -->