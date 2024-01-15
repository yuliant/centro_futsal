<div class="container-fluid">

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="row">
        <div class="col-lg-8 col-sm-11">

            <!-- Card all supplier-->
            <div class="col-lg-12 mt-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("Tambah Data Alasan BAP") ?></h6>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('utilitas/alasan_bap/add') ?>" method="post">
                            <div class="form-group row">
                                <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alasan" name="alasan" value="<?php echo set_value('alasan') ?>">
                                    <?php echo form_error('alasan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="text-md-right">
                                <a href="<?= base_url('utilitas/alasan_bap') ?>" class="btn btn-light mr-2">Batal</a>
                                <button class="btn btn-primary" type="submit" id="save-btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->