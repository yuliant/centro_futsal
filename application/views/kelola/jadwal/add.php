<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

    <!-- edit nama dan gambar user -->
    <div class="row">
        <div class="col-lg-8">

            <?php echo form_open_multipart('kelola/jadwal/add'); ?>

            <div class="form-group row">
                <label for="tgl_jadwal" class="col-sm-2 col-form-label">Tanggal Jadwal <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_jadwal" name="tgl_jadwal" value="<?= set_value('tgl_jadwal') ?>" required>
                    <?= form_error('tgl_jadwal', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="jam" class="col-sm-2 col-form-label">Jam <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jam" name="jam" value="<?= set_value('jam') ?>" placeholder="07.00 - 08.00" required>
                    <?= form_error('jam', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="id_lapangan" class="col-sm-2 col-form-label">Lapangan <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <select class="form-control" id="id_lapangan" name="id_lapangan" required>
                        <option value="">Pilih</option>
                        <?php foreach ($lapangan as $a) : ?>
                            <option value="<?php echo $a->id_lapangan ?>"><?php echo $a->nama_lapangan ?></option>
                        <?php endforeach ?>
                    </select>
                    <?php echo form_error('id_lapangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->