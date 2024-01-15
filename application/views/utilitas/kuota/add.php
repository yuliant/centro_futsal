<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo strtoupper($title) ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <!-- flashdata message -->
            <?php echo $this->session->flashdata('message'); ?>

            <form class="" action="<?php echo base_url('utilitas/kuota/add'); ?>" method="post">
                <div class="form-group">
                    <label for="tgl_kedatangan">Tanggal</label>
                    <input type="date" class="form-control" id="tgl_kedatangan" name="tgl_kedatangan" required>
                    <?php echo form_error('tgl_kedatangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                    <?php echo form_error('jam_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                    <?php echo form_error('jam_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="kuota">Kuota</label>
                    <input type="number" class="form-control" id="kuota" name="kuota" required>
                    <?php echo form_error('kuota', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="<?php echo base_url('utilitas/kuota/index') ?>" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>

</div>

</div>
<!-- End of Main Content -->