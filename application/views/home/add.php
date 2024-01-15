<div class="container-fluid">

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col-lg-9 col-sm-11">

            <!-- Card all supplier-->
            <div class="col-lg-12 mt-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("buat permohonan") ?></h6>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('home/pengajuan') ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

                            <div class="form-group row">
                                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nik" name="nik" value="<?php echo set_value('nik') ?>" onkeypress="return isNumber(event)" required>
                                    <?php echo form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_pemohon" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value="<?php echo set_value('nama_pemohon') ?>" required>
                                    <?php echo form_error('nama_pemohon', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo set_value('tempat_lahir') ?>" required>
                                    <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir') ?>" required>
                                    <?php echo form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telpon" class="col-sm-2 col-form-label">No Telp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telpon" name="telpon" value="<?php echo set_value('telpon') ?>" onkeypress="return isNumber(event)" required>
                                    <?php echo form_error('telpon', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email') ?>" required>
                                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="alamat" name="alamat" required><?php echo set_value('alamat') ?></textarea>
                                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_paspor" class="col-sm-2 col-form-label">No Paspor</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="punya_paspor" required>
                                        <option value="">Pilih</option>
                                        <option value="tidak" <?php echo set_select('punya_paspor', 'tidak', False); ?>>Tidak</option>
                                        <option value="iya" <?php echo set_select('punya_paspor', 'iya', False); ?>>Iya</option>
                                    </select>
                                </div>
                                <label id="labelTampil" style="display: none;" class="col-sm-2 col-form-label"></label>
                                <div id="divTampil" style="display: none;" class="col-sm-9 mt-2">
                                    <input type="text" class="form-control" id="no_paspor" name="no_paspor" value="<?php echo set_value('no_paspor') ?>" onclick="showModal()">
                                    <?php echo form_error('no_paspor', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div id="divModal" style="display: none;" class="col-sm-1 my-auto">
                                    <a href="#">
                                        <i class="text-danger fas fa-exclamation-circle" onclick="showModal2()"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keluaran_kanim" class="col-sm-2 col-form-label">Keluaran Kanim </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="keluaran_kanim" name="keluaran_kanim" value="<?php echo set_value('keluaran_kanim') ?>">
                                    <?php echo form_error('keluaran_kanim', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alasan_bap" class="col-sm-2 col-form-label">Alasan BAP</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="alasan_bap" name="alasan_bap" required>
                                        <option value="">Pilih</option>
                                        <?php foreach ($alasan_bap as $a) : ?>
                                            <option value="<?php echo $a->no_alasan_bap ?>" <?php echo set_select('alasan_bap', $a->no_alasan_bap, False); ?>><?php echo $a->alasan ?></option>
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
                                        <option value="Walk in" <?php echo set_select('metode_bap', 'Walk in', False); ?>>Walk in</option>
                                        <!--<option value="On the spot" <?php echo set_select('metode_bap', 'On the spot', False); ?>>On the spot</option>-->
                                        <option value="Zoom" <?php echo set_select('metode_bap', 'Zoom', False); ?>>Zoom</option>
                                    </select>
                                    <?php echo form_error('metode_bap', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto_ktp" id="foto_ktp" required>
                                        <label class=" custom-file-label" for="foto_ktp">Upload Foto KTP</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto_kk" class="col-sm-2 col-form-label">Foto KK</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto_kk" id="foto_kk">
                                        <label class="custom-file-label" for="foto_kk">Upload Foto KK</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto_akte_lahir" class="col-sm-2 col-form-label">Foto Akte Kelahiran/Buku Nikah/Ijasah</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto_akte_lahir" id="foto_akte_lahir">
                                        <label class="custom-file-label" for="foto_akte_lahir">Upload Foto Akte / dll</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto_lain" class="col-sm-2 col-form-label">Foto Biodata Paspor</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="foto_lain" id="foto_lain">
                                        <label class="custom-file-label" for="foto_lain">Upload Foto Halaman biodata Paspor</label>
                                    </div>
                                </div>
                            </div>
                            <div id="gambar" style="display: none;">
                                <div class="form-group row">
                                    <label for="foto_sk_polisi" id="labelgambar" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto_sk_polisi" id="foto_sk_polisi">
                                            <label class="custom-file-label" id="uploadgambar" for="foto_sk_polisi"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-md-right">
                                <a href="<?= base_url('home/') ?>" class="btn btn-light mr-2">Kembali</a>
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

<script>
    var gambar = document.getElementById("gambar");
    var alasan_bap = document.getElementById("alasan_bap");
    var labelgambar = document.getElementById("labelgambar");
    var uploadgambar = document.getElementById("uploadgambar");

    alasan_bap.addEventListener("change", function() {
        if (alasan_bap.value === "1") {
            gambar.style.display = "block";
            labelgambar.textContent = "Upload SK Kehilangan Polisi";
            uploadgambar.textContent = "Upload SK Kehilangan Polisi";
        } else if (alasan_bap.value === "3") {
            gambar.style.display = "block";
            labelgambar.textContent = "Upload surat keterangan dari instansi terkait";
            uploadgambar.textContent = "Upload suket (bencana)";
        } else if (alasan_bap.value === "4") {
            gambar.style.display = "block";
            labelgambar.textContent = "Upload Foto Kerusakan Paspor";
            uploadgambar.textContent = "Upload Foto Kerusakan Paspor";
        } else if (alasan_bap.value === "5") {
            gambar.style.display = "block";
            labelgambar.textContent = "Upload pendukung dari pengadilan / yang berwenang";
            uploadgambar.textContent = "Upload foto pendukung dari yang berwenang";
        } else {
            gambar.style.display = "none";
        }
    });
</script>
<script>
    var dropdown = document.getElementById("punya_paspor");
    var divTampil = document.getElementById("divTampil");
    var labelTampil = document.getElementById("labelTampil");
    var divModal = document.getElementById("divModal");

    dropdown.addEventListener("change", function() {
        if (dropdown.value === "iya") {
            divTampil.style.display = "block";
            labelTampil.style.display = "block";
            divModal.style.display = "block";
        } else {
            divTampil.style.display = "none";
            labelTampil.style.display = "none";
            divModal.style.display = "none";
        }
    });
</script>

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
                    <li>Klik tombol "Buat Permohonan" </li>
                    <li>Isi data dan upload dokumen </li>
                    <li>Pilih metode "Walk In" pada kolom Metode BAP</li>
                    <li>Tunggu sampai berkas Terverivikasi</li>
                    <li>Apabila sudah terverifikasi silahkan datang ke Kantor Imigrasi Kelas I TPI Jakarta Utara sesuai dengan jadwal yang dipilih dengan membawa dokumen asli</li>

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
                    <li>Paspor terbitan kanimKhusus paspor terbitan Kantor Imigrasi Jakarta Utara </li>
                    <li>Khusus pergantian paspor hilang dan rusak </li>
                    <li>Mendaftar di aplikasi</li>
                    <li>Wajib menggunakan pakaian yang sopan dan rapih serta harus dalam keadaan tenang </li>
                    <li>Petugas dapat membatalkan jadwal pemeriksaan apabila pemohon dianggap tidak melaksanakan kewajiban pada poin nomor 4</li>
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
                <h5 class="modal-title" id="noPasporLabel">panduan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                no paspor wajib di isi
                jika tidak tahu maka wajib untuk menghubungi kantor imigrasi penerbit paspor yang terakhir
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>