<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

  <!-- edit nama dan gambar user -->
  <div class="row">
    <div class="col-lg-8">

      <?php if (@$id) { ?>
        <?php echo form_open_multipart('admin/edit_user/' . $id); ?>
      <?php } else { ?>
        <?php echo form_open_multipart('user/edit'); ?>
      <?php } ?>

      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <?php if (@$member) { ?>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $member['email']; ?>" readonly>
          <?php } else { ?>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" readonly>
          <?php } ?>
        </div>
      </div>

      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Full name</label>
        <div class="col-sm-10">
          <?php if (@$member) { ?>
            <input type="text" class="form-control" id="name" name="name" value="<?= $member['name']; ?>">
          <?php } else { ?>
            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
          <?php } ?>
          <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-2">Picture</div>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-3">
              <?php if (@$member) { ?>
                <img src="<?php echo base_url('assets/img/profile/') . $member['image']; ?>" class="img-thumbnail">
              <?php } else { ?>
                <img src="<?php echo base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
              <?php } ?>
            </div>
            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group row justify-content-end">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </div>

      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->