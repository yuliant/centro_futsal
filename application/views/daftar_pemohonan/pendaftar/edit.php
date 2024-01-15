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
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("Edit Pendaftaran") ?></h6>
                    </div>
                    <div class="card-body">
                        <?php echo form_open_multipart('pemohon/pendaftar/edit/' . $pemohon->id_pemohon_dd); ?>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?php echo $pemohon->tgl_kedatangan ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nik" name="nik" value="<?php echo $pemohon->nik ?>">
                                <?php echo form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pemohon" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value="<?php echo $pemohon->nama_pemohon ?>">
                                <?php echo form_error('nama_pemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $pemohon->tempat_lahir ?>">
                                <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $pemohon->tanggal_lahir ?>">
                                <?php echo form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telpon" class="col-sm-2 col-form-label">No Telp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="telpon" name="telpon" value="<?php echo $pemohon->telpon ?>">
                                <?php echo form_error('telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $pemohon->email ?>">
                                <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="alamat" name="alamat"><?php echo $pemohon->alamat ?></textarea>
                                <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_paspor" class="col-sm-2 col-form-label">No Paspor (optional)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_paspor" name="no_paspor" value="<?php echo $pemohon->no_paspor ?>">
                                <?php echo form_error('no_paspor', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keluaran_kanim" class="col-sm-2 col-form-label">Keluaran Kanim (optional)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="keluaran_kanim" name="keluaran_kanim" value="<?php echo $pemohon->keluaran_kanim ?>">
                                <?php echo form_error('keluaran_kanim', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alasan_bap" class="col-sm-2 col-form-label">Alasan BP</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="alasan_bap" name="alasan_bap">
                                    <option value="">Pilih</option>
                                    <?php foreach ($alasan_bap as $a) : ?>
                                        <option value="<?php echo $a->no_alasan_bap ?>"><?php echo $a->alasan ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="pl-3">*<?php echo $pemohon->alasan ?></small>
                                <?php echo form_error('alasan_bap', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="metode_bap" class="col-sm-2 col-form-label">Alasan BP</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="metode_bap" name="metode_bap">
                                    <option value="">Pilih</option>
                                    <option value="Walk in">Walk in</option>
                                    <option value="On the spot">On the spot</option>
                                    <option value="Zoom">Zoom</option>
                                </select>
                                <small class="pl-3">*<?php echo $pemohon->metode_bap ?></small>
                                <?php echo form_error('metode_bap', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                            <div class="col-sm-10">
                                <div class="col-sm-3 mb-2">
                                    <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_ktp ?>" target="_blank">
                                        <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_ktp ?>" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto_ktp" id="foto_ktp">
                                    <label class="custom-file-label" for="foto_ktp">Upload Foto</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_sk_polisi" class="col-sm-2 col-form-label">Foto SK Kehilangan Polisi (opsional)</label>
                            <div class="col-sm-10">
                                <?php if ($pemohon->foto_sk_polisi) : ?>
                                    <div class="col-sm-3 mb-2">
                                        <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_sk_polisi ?>" target="_blank">
                                            <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_sk_polisi ?>" class="img-thumbnail">
                                        </a>
                                    </div>
                                <?php endif ?>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto_sk_polisi" id="foto_sk_polisi">
                                    <label class="custom-file-label" for="foto_sk_polisi">Upload Foto</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-md-right">
                            <a href="<?= base_url('pemohon/pendaftar') ?>" class="btn btn-light mr-2">Batal</a>
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