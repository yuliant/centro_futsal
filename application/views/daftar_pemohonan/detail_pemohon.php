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
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("Detail Pendaftaran") ?></h6>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="status_laporan" class="col-sm-2 col-form-label">Status Laporan</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?php
                                                                                        if ($pemohon->status_laporan == 1) {
                                                                                            echo "Tahap " . "Pendaftaran";
                                                                                        } elseif ($pemohon->status_laporan == 2) {
                                                                                            echo "Tahap " . "Cek Berkas";
                                                                                        } elseif ($pemohon->status_laporan == 3) {
                                                                                            echo "Tahap " . "Pemeriksaan";
                                                                                        } elseif ($pemohon->status_laporan == 4) {
                                                                                            echo "Tahap " . "BAP";
                                                                                        } else {
                                                                                            echo "Tahap " . "Putusan";
                                                                                        }
                                                                                        ?>">
                            </div>
                        </div>

                        <?php if ($pemohon->status_laporan == 5) : ?>
                            <div class="form-group row">
                                <label for="putusan" class="col-sm-2 col-form-label">Putusan</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" readonly><?php echo $pemohon->putusan ?></textarea>
                                </div>
                            </div>
                        <?php endif ?>

                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Kedatangan</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?php echo $pemohon->tgl_kedatangan ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?php echo $pemohon->nik ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_pemohon" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?php echo $pemohon->nama_pemohon ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?php echo $pemohon->tempat_lahir ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" readonly class="form-control" value="<?php echo $pemohon->tanggal_lahir ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telpon" class="col-sm-2 col-form-label">No Telp</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?php echo $pemohon->telpon ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?php echo $pemohon->email ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" readonly><?php echo $pemohon->alamat ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_paspor" class="col-sm-2 col-form-label">No Paspor (optional)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly value="<?php echo $pemohon->no_paspor ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keluaran_kanim" class="col-sm-2 col-form-label">Keluaran Kanim (optional)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly value="<?php echo $pemohon->keluaran_kanim ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alasan_bap" class="col-sm-2 col-form-label">Alasan BAP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly value="<?php echo $pemohon->alasan ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="metode_bap" class="col-sm-2 col-form-label">Metode BAP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly value="<?php echo $pemohon->metode_bap ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
                            <div class="col-sm-10">
                                <?php if (!$pemohon->foto_ktp) {
                                    echo "<i class='text-danger'>Tidak ada gambar</i>";
                                } else { ?>
                                    <div class="col-sm-3 mb-2">
                                        <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_ktp ?>" target="_blank">
                                            <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_ktp ?>" class="img-thumbnail">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_kk" class="col-sm-2 col-form-label">Foto KK</label>
                            <div class="col-sm-10">
                                <?php if (!$pemohon->foto_kk) {
                                    echo "<i class='text-danger'>Tidak ada gambar</i>";
                                } else { ?>
                                    <div class="col-sm-3 mb-2">
                                        <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_kk ?>" target="_blank">
                                            <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_kk ?>" class="img-thumbnail">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_akte_lahir" class="col-sm-2 col-form-label">Foto Akte Kelahiran/Buku Nikah/Ijasah</label>
                            <div class="col-sm-10">
                                <?php if (!$pemohon->foto_akte_lahir) {
                                    echo "<i class='text-danger'>Tidak ada gambar</i>";
                                } else { ?>
                                    <div class="col-sm-3 mb-2">
                                        <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_akte_lahir ?>" target="_blank">
                                            <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_akte_lahir ?>" class="img-thumbnail">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_lain" class="col-sm-2 col-form-label">Foto Paspor</label>
                            <div class="col-sm-10">
                                <?php if (!$pemohon->foto_lain) {
                                    echo "<i class='text-danger'>Tidak ada gambar</i>";
                                } else { ?>
                                    <div class="col-sm-3 mb-2">
                                        <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_lain ?>" target="_blank">
                                            <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_lain ?>" class="img-thumbnail">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Dibuat</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?php echo $pemohon->tgl_dibuat ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tgl Akhir Update Status</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?php echo $pemohon->tgl_ubah_status ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_sk_polisi" class="col-sm-2 col-form-label">
                                <?php if ($pemohon->alasan_bap == 1) {
                                    echo "Foto SK Kehilangan Polisi";
                                } elseif ($pemohon->alasan_bap == 3) {
                                    echo "Foto force majeure (bencana)";
                                } elseif ($pemohon->alasan_bap == 4) {
                                    echo "Foto Kerusakan Paspor";
                                } elseif ($pemohon->alasan_bap == 5) {
                                    echo "Foto pendukung dari pengadilan / yang berwenang";
                                } else {
                                    echo "Foto Lainnya";
                                } ?>
                            </label>
                            <div class="col-sm-10">
                                <?php if (!$pemohon->foto_sk_polisi) {
                                    echo "<i class='text-danger'>Tidak ada gambar</i>";
                                } else { ?>
                                    <div class="col-sm-3 mb-2">
                                        <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_sk_polisi ?>" target="_blank">
                                            <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_sk_polisi ?>" class="img-thumbnail">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto_ttd" class="col-sm-2 col-form-label">
                                <?php echo "Tanda Tangan Pemohon"; ?>
                            </label>
                            <div class="col-sm-10">
                                <?php if (!$pemohon->foto_ttd) {
                                    echo "<i class='text-danger'>Tidak ada gambar</i>";
                                } else { ?>
                                    <div class="col-sm-3 mb-2">
                                        <a href="<?php echo base_url('assets/img/data/') . $pemohon->foto_ttd ?>" target="_blank">
                                            <img src="<?php echo base_url('assets/img/data/') . $pemohon->foto_ttd ?>" class="img-thumbnail">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="text-md-right">
                            <a href="#" onclick='goBack()' class="btn btn-secondary">Batal</a>
                        </div>

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