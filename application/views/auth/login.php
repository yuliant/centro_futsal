<br>
<br>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <h4 class="text-gray-900 text-center">Aplikasi Penyewaan Lapangan Centro Futsal </h4>

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-7 d-none d-lg-block">
                            <!-- change image here -->
                            <img style="height: 400px; width: 560px" src="<?php echo base_url() ?>assets/img/denpa5.png">
                        </div>
                        <div class="col-lg-5">
                            <div class="p-5">
                                <div class="text-center">
                                    <p class="h6 text-gray-900 mb-1">Selamat Datang di</p>
                                    <h6 class="text-gray-900 mb-4">Centro Futsal</h6>
                                </div>

                                <?php echo $this->session->flashdata('message'); ?>

                                <form class="user" action="<?php echo base_url('auth'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" value="<?php echo set_value('email'); ?>" name="email" id="email" placeholder="Masukkan Email..." onkeypress="return isNumber(event)">
                                        <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" value="<?php echo set_value('password'); ?>" name="password" id="password" placeholder="Masukkan Password...">
                                        <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-user btn-block text-white btn-success">
                                        Login
                                    </button>
                                    <div class="text-center m-2">
                                        <a href="<?= base_url() ?>" class="text-success">
                                            <small><u>Home</u></small>
                                        </a>
                                        .
                                        <a href="<?= base_url('auth/registration') ?>" class="text-success">
                                            <small><u>Registrasi</u></small>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>