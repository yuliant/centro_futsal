<?php
$this->db->from('notif');
$this->db->where('baca', 0);
$notif = $this->db->get()->num_rows();

$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

if ($user) {
    $this->db->from('tb_penyewaan');
    $this->db->where('id_user', $user['id']);
    $keranjang = $this->db->get()->num_rows();
}

?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-dark  navbar-expand-lg" style="background-color: #006d55;">
            <a class="navbar-brand" href="<?= base_url('home') ?>">
                <b>
                    Centro Futsal
                </b>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?= ($this->uri->segment(1) == 'home' || $this->uri->segment(1) == '') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown <?= ($this->uri->segment(1) == 'info') ? 'active' : '' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pusat Informasi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item <?= ($this->uri->segment(2) == 'lapangan') ? 'active' : '' ?>" href="<?= base_url('info/lapangan') ?>">Info Lapangan</a>
                            <a class="dropdown-item <?= ($this->uri->segment(2) == 'daftar_booking') ? 'active' : '' ?>" href="<?= base_url('info/daftar_booking') ?>">Daftar Booking</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'cara_pesan') ? 'active' : '' ?>" href="<?= base_url('cara_pesan') ?>">Cara Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($this->uri->segment(1) == 'kontak') ? 'active' : '' ?>" href="<?= base_url('kontak') ?>">Kontak</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <?php if ($user) { ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link <?= ($this->uri->segment(1) == 'keranjang') ? 'active' : '' ?>" href="<?= base_url('keranjang') ?>">
                                <i class="fas fa-shopping-cart"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?= @$keranjang ?></span>
                            </a>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link" href="<?= base_url('pemohon/notif') ?>">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?= @$notif ?></span>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block bg-white"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small"><b><?php echo $user['name']; ?></b></span>
                                <img class="img-profile" width="32" src="<?php echo base_url('assets/img/profile/') . $user['image']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-lg-inline text-white"><b><?php echo "Masuk"; ?></b></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('auth/'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Login
                                </a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <!-- End of Topbar -->