<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<div class="container-fluid">

	<div>
		<?php echo $this->session->flashdata('message'); ?>
	</div>

	<div class="row">
		<div class="col"></div>
		<div class="col-lg-10 col-sm-11">

			<!-- Card all supplier-->
			<div class="col-lg-12 mt-3">

				<?php if ($pemohon->status_laporan == 2 && $pemohon->id_tgl_kedatangan == null && $pemohon->status == 1) : ?>
					<div class="card mb-2 bg-success">
						<div class="card-body text-center">
							<h5 class="card-title text-white">Permohonan sudah diterima, silahkan pilih tanggal kedatangan</h5>
							<a href="<?= base_url('home/pilihtanggal/') . encrypt_url($pemohon->id_pemohon_dd) ?>" class="btn btn-light">Pilih Tanggal</a>
						</div>
					</div>
				<?php endif ?>

				<?php if ($pemohon->id_tgl_kedatangan != null && $pemohon->status == 1 && $pemohon->status_laporan != 4 && $pemohon->status_laporan != 5) : ?>
					<div class="card mb-2 bg-success">
						<div class="card-body text-center">
							<h5 class="card-title text-white">Cetak antrian permohonan anda dibawah ini</h5>
							<a href="<?= base_url('home/cetak/') . $pemohon->kode_pendaftaran ?>" target="_blank" class="btn btn-light">Cetak</a>
						</div>
					</div>
				<?php endif ?>

				<?php if ($pemohon->id_tgl_kedatangan != null && $pemohon->status == 1 && $pemohon->status_laporan == 4 && !$pemohon->foto_ttd && $pemohon->metode_bap != 'Walk in') : ?>
					<div class="card mb-2 bg-warning">
						<div class="card-body text-center">
							<h5 class="card-title text-dark">Silahkan tanda tangan berkas permohonan anda sebelum ke tahap selanjutnya</h5>
							<a href="<?= base_url('home/tanda_tangan/') . encrypt_url($pemohon->id_pemohon_dd) ?>" class="btn btn-light">Tanda Tangan</a>
						</div>
					</div>
				<?php endif ?>

				<?php if ($pemohon->status_laporan == 2 && $pemohon->status == 2) : ?>
					<div class="card mb-2 bg-danger">
						<div class="card-body text-center">
							<h5 class="card-title text-white">Permohonan anda ditolak, silahkan lihat kolom "Kekurangan" dan perbaiki dengan klik tombol edit data dibawah ini</h5>
							<a href="<?= base_url('home/edit/') . encrypt_url($pemohon->id_pemohon_dd) ?>" class="btn btn-light">Edit data</a>
						</div>
					</div>
				<?php endif ?>

				<div class="card shadow mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("Detail Permohonan") ?></h6>
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

						<?php if ($pemohon->status_laporan == 2 && $pemohon->status == 2) : ?>
							<div class="form-group row">
								<label for="kekurangan" class="col-sm-2 col-form-label">Kekurangan</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control border-danger" readonly><?php echo $pemohon->putusan ?></textarea>
								</div>
							</div>
						<?php endif ?>

						<?php if ($pemohon->status_laporan == 5) : ?>
							<div class="form-group row">
								<label for="putusan" class="col-sm-2 col-form-label">Putusan</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control" readonly><?php echo $pemohon->putusan ?></textarea>
								</div>
							</div>
						<?php endif ?>

						<?php if ($pemohon->id_tgl_kedatangan != null) : ?>
							<div class="form-group row">
								<label for="tanggal" class="col-sm-2 col-form-label">Jam</label>
								<div class="col-sm-10">
									<input type="text" readonly class="form-control" value="<?php echo $pemohon->jam_mulai . " sampai " . $pemohon->jam_selesai ?>">
								</div>
							</div>
							<div class="form-group row">
								<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
								<div class="col-sm-10">
									<input type="text" readonly class="form-control" value="<?php echo $pemohon->tgl_kedatangan ?>">
								</div>
							</div>
						<?php endif ?>

						<?php if ($pemohon->status_laporan == 2 && $pemohon->status == 0) : ?>
							<div class="form-group row">
								<i>
									<span class="text-danger">Berkas masih dalam proses pengecekan. Silahkan pilih tanggal jika berkas sudah diterima</span>
								</i>
							</div>
						<?php endif ?>

						<hr class="bg-dark">

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

						<div class="" style="display: none;">
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
								<label for="foto_sk_polisi" class="col-sm-2 col-form-label">Foto SK Kehilangan Polisi</label>
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
						</div>

						<div class="text-md-right">
							<!-- <a href="#" onclick='goBack()' class="btn btn-secondary">Batal</a> -->
							<a href="<?= base_url('home') ?>" class="btn btn-secondary">Batal</a>
						</div>

					</div>
				</div>
			</div>

		</div>
		<div class="col"></div>
	</div>

</div>
</div>
<!-- End of Main Content -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">

<script>
	<?php
	if ($this->session->flashdata("success")) { ?>
		Swal.fire(
			'Selamat',
			'Data Permohonan berhasil diajukan',
			'success'
		)
	<?php } ?>

	<?php
	if ($this->session->flashdata("ttd")) { ?>
		Swal.fire(
			'Selamat',
			'Data Permohonan berhasil di tanda tangani',
			'success'
		)
	<?php } ?>
</script>

<script>
	function goBack() {
		window.history.back();
	}
</script>