<div class="container-fluid">

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="row">
        <div class="col-lg-10 col-sm-11">

            <!-- Card all supplier-->
            <div class="col-lg-12 mt-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("Input Putusan") ?></h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('pemohon/putusan/input_putusan/' . $id) ?>" method="post">

                            <div class="form-group row">
                                <label for="putusan" class="col-sm-2 col-form-label">Putusan</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="putusan" name="putusan"><?php echo set_value('putusan') ?></textarea>
                                    <?php echo form_error('putusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="text-md-right">
                                <a href="#" onclick='goBack()' class="btn btn-secondary">Batal</a>
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

<script>
    function goBack() {
        window.history.back();
    }
</script>