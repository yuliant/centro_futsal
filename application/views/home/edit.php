<div class="container-fluid">

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col-lg-10 col-sm-11">

            <!-- Card all supplier-->
            <div class="col-lg-12 mt-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("edit permohonan") ?></h6>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('home/edit/') . encrypt_url($id_pemohon) ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

                            <div class="form-group row">
                                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $pemohon->nik ?>" onkeypress="return isNumber(event)" required>
                                    <?php echo form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_pemohon" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value="<?= $pemohon->nama_pemohon ?>" required>
                                    <?php echo form_error('nama_pemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $pemohon->tempat_lahir ?>" required>
                                    <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $pemohon->tanggal_lahir ?>" required>
                                    <?php echo form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telpon" class="col-sm-2 col-form-label">No Telp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telpon" name="telpon" value="<?= $pemohon->telpon ?>" onkeypress="return isNumber(event)" required>
                                    <?php echo form_error('telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $pemohon->email ?>" required>
                                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="alamat" name="alamat" required><?= $pemohon->alamat ?></textarea>
                                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_paspor" class="col-sm-2 col-form-label">No Paspor</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_paspor" name="no_paspor" value="<?= $pemohon->no_paspor ?>" onclick="showModal()" required>
                                    <?php echo form_error('no_paspor', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-1 my-auto">
                                    <a href="#">
                                        <i class="text-danger fas fa-exclamation-circle" onclick="showModal2()"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keluaran_kanim" class="col-sm-2 col-form-label">Keluaran Kanim </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="keluaran_kanim" name="keluaran_kanim" value="<?= $pemohon->keluaran_kanim ?>">
                                    <?php echo form_error('keluaran_kanim', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alasan_bap" class="col-sm-2 col-form-label">Alasan BAP</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="alasan_bap" name="alasan_bap" required>
                                        <option value="">Pilih</option>
                                        <?php foreach ($alasan_bap as $a) : ?>
                                            <option value="<?php echo $a->no_alasan_bap ?>" <?= ($pemohon->alasan_bap == $a->no_alasan_bap) ? 'selected' : '' ?> <?php echo set_select('alasan_bap', $a->no_alasan_bap, False); ?>><?php echo $a->alasan ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php echo form_error('alasan_bap', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="metode_bap" class="col-sm-2 col-form-label">Metode BAP</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="metode_bap" name="metode_bap" required>
                                        <option value="">Pilih</option>
                                        <option value="Walk in" <?= ($pemohon->metode_bap == 'Walk in') ? 'selected' : '' ?> <?php echo set_select('metode_bap', 'Walk in', False); ?>>Walk in</option>
                                        <!-- <option value="On the spot" <?= ($pemohon->metode_bap == 'On the spot') ? 'selected' : '' ?> <?php echo set_select('metode_bap', 'On the spot', False); ?>>On the spot</option>-->
                                        <option value="Zoom" <?= ($pemohon->metode_bap == 'Zoom') ? 'selected' : '' ?> <?php echo set_select('metode_bap', 'Zoom', False); ?>>Zoom</option>
                                    </select>
                                    <?php echo form_error('metode_bap', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                                <div class="col-sm-10">
                                    <?php if ($pemohon->foto_ktp) { ?>
                                        <div class="col-sm-6 mb-2">
                                            <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_ktp ?>" target="_blank">
                                                <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_ktp ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto_ktp" id="foto_ktp">
                                        <label class="custom-file-label" for="foto_ktp">Upload Foto KTP</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto_kk" class="col-sm-2 col-form-label">Foto KK</label>
                                <div class="col-sm-10">
                                    <?php if ($pemohon->foto_kk) { ?>
                                        <div class="col-sm-6 mb-2">
                                            <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_kk ?>" target="_blank">
                                                <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_kk ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto_kk" id="foto_kk">
                                        <label class="custom-file-label" for="foto_kk">Upload Foto KK</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto_akte_lahir" class="col-sm-2 col-form-label">Foto Akte Kelahiran/Buku Nikah/Ijasah</label>
                                <div class="col-sm-10">
                                    <?php if ($pemohon->foto_akte_lahir) { ?>
                                        <div class="col-sm-6 mb-2">
                                            <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_akte_lahir ?>" target="_blank">
                                                <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_akte_lahir ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto_akte_lahir" id="foto_akte_lahir">
                                        <label class="custom-file-label" for="foto_akte_lahir">Upload Foto Akte / dll</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto_lain" class="col-sm-2 col-form-label">Foto Paspor</label>
                                <div class="col-sm-10">
                                    <?php if ($pemohon->foto_lain) { ?>
                                        <div class="col-sm-6 mb-2">
                                            <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_lain ?>" target="_blank">
                                                <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_lain ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto_lain" id="foto_lain">
                                        <label class="custom-file-label" for="foto_lain">Upload Foto Paspor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto_sk_polisi" class="col-sm-2 col-form-label">
                                    <?php if ($pemohon->alasan_bap == 1) {
                                        echo "Foto SK Kehilangan Polisi";
                                    } elseif ($pemohon->alasan_bap == 3) {
                                        echo "Foto force majour (bencana)";
                                    } elseif ($pemohon->alasan_bap == 5) {
                                        echo "Foto pendukung dari pengadilan / yang berwenang";
                                    } else {
                                        echo "Foto Lainnya";
                                    } ?>
                                </label>
                                <div class="col-sm-10">
                                    <?php if ($pemohon->foto_sk_polisi) { ?>
                                        <div class="col-sm-6 mb-2">
                                            <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_sk_polisi ?>" target="_blank">
                                                <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_sk_polisi ?>" class="img-thumbnail">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto_sk_polisi" id="foto_sk_polisi">
                                        <label class="custom-file-label" for="foto_sk_polisi">
                                            <?php if ($pemohon->alasan_bap == 1) {
                                                echo "Upload SK Kehilangan Polisi";
                                            } elseif ($pemohon->alasan_bap == 3) {
                                                echo "Upload force majour (bencana)";
                                            } elseif ($pemohon->alasan_bap == 5) {
                                                echo "Upload foto pendukung dari yang berwenang";
                                            } else {
                                                echo "Foto Lainnya";
                                            } ?>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-md-right">
                                <a href="#" onclick="goBack()" class="btn btn-light mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit" id="save-btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col"></div>
    </div>

</div>
</div>
<!-- End of Main Content -->

<!-- Walk In Modal-->
<div class="modal fade" id="walkInModal" tabindex="-1" role="dialog" aria-labelledby="walkInModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="walkInModalLabel">Panduan Walk In</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Silahkan klik tombol buat permohonan, lalu pilih tanggal booking.</li>
                    <li>Lalu silahkan isi data permohoan. Kalau sudah klik simpan.</li>
                    <li>Silahkan download PDF, lalu print antrian tersebut.</li>
                    <li>Silahkan pergi ke Kantor Imigrasi sesuai dengan tanggal booking anda dengan membawa hasil print sebelumnya.</li>
                    <li>(opsional)Buat anda yang ingin mencetak antrian, silahkan klik cetak permohonan.</li>
                    <li>(opsional)Silahkan input NIK anda, lalu pilih tanggal antrian yang ingin anda cetak.</li>
                </ol>

                Cara cek berkas:
                <ol>
                    <li>Klik tombol Cetak & Cek Permohonan</li>
                    <li>Masukkan NIK yang telah terdfaftar </li>
                    <li>setelah muncul list klik detail</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>

<!-- On The Spot Modal-->
<div class="modal fade" id="onTheSpotModal" tabindex="-1" role="dialog" aria-labelledby="onTheSpotModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="onTheSpotModalLabel">Persyaratan On the Spot</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>KTP</li>
                    <li>Paspor terbitan kanim</li>
                    <li>Sakit (bukan covid)</li>
                    <li>Usia di atas 60 thn</li>
                    <li>Mendaftar di aplikasi</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>

<!-- Zoom Modal-->
<div class="modal fade" id="zoomModal" tabindex="-1" role="dialog" aria-labelledby="zoomModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomModalLabel">Persyaratan Zoom</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Paspor terbitan kanim</li>
                    <li>Bukan untuk perubahan data</li>
                    <li>Bisa di gunakan untuk pasien Covid 19</li>
                    <li>Mendaftar di aplikasi</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>

<!-- No Paspor -->
<div class="modal fade" id="noPaspor" tabindex="-1" role="dialog" aria-labelledby="noPasporLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noPasporLabel">Persyaratan Zoom</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                coba
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>