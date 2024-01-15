<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900">Buat akun</h1>
              <!-- <p class="h6 text-gray-900 mb-1">Selamat Datang di</p> -->
              <h6 class="text-gray-900 mb-4">Centro Futsal</h6>
            </div>
            <form class="user" method="post" action="<?php echo base_url('auth/registration'); ?>">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?php echo set_value('name'); ?>">
                <?php echo form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                  <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-user btn-block">
                Buat Akun
              </button>
            </form>
            <hr>
            <div class="text-center">
              <!-- <a class="small" href="<?php echo base_url('auth/forgotPassword'); ?>">Forgot Password?</a> -->
            </div>
            <div class="text-center">
              <a class="small text-success" href="<?php echo base_url('auth'); ?>">Sudah punya akun? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>