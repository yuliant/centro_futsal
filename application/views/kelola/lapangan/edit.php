<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

    <!-- edit nama dan gambar user -->
    <div class="row">
        <div class="col-lg-8">

            <?php echo form_open_multipart('kelola/lapangan/edit/' . $id); ?>

            <div class="form-group row">
                <label for="nama_lapangan" class="col-sm-2 col-form-label">Nama Lapangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_lapangan" name="nama_lapangan" value="<?= $lapangan['nama_lapangan'] ?>">
                    <?= form_error('nama_lapangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="keterangan" id="" cols="30" rows="10"><?= $lapangan['keterangan'] ?></textarea>
                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $lapangan['harga'] ?>">
                    <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="<?php echo base_url('assets/img/data/') . $lapangan['gambar'] ?>" target="_blank">
                                <img src="<?php echo base_url('assets/img/data/') . $lapangan['gambar']; ?>" class="img-thumbnail">
                            </a>
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