<?php
// $this->db->from('notif');
// $this->db->where('baca', 0);
// $notif = $this->db->get()->num_rows();
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #006d55;">

      <!-- <h4 class="text-white text-center">APLIKASI BERITA ACARA PEMERIKSAAN PASPOR ONLINE (BAPPO)</h4> -->
      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link" href="<?= base_url('pemohon/notif') ?>">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger badge-counter"><?= @$notif ?></span>
          </a>
        </li> -->

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-white small"><b><?php echo $user['name']; ?></b></span>
            <img class="img-profile" src="<?php echo base_url('assets/img/profile/') . $user['image']; ?>">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              My Profile
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->