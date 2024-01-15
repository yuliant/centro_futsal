<br>
<br>
<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<h4 class="text-primary-900 text-center" style="font-family: 'Poppins', sans-serif;">APLIKASI BERITA ACARA PEMERIKSAAN PASPOR ONLINE</h4>
			<h4 class="text-gray-900 text-center">BAPPO</h4>
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-7 d-none d-lg-block">
							<!-- change image here -->
							<img style="
							height: 400px; 
							width: 560px;
							" src="<?php echo base_url() ?>assets/img/denpa5.png">
						</div>
						<div class="col-lg-5">
							<div class="p-5">
								<div class="text-center">
									<p class="h6 text-gray-900 mb-1"><u>INTELIJEN DAN PENINDAKAN KEIMIGRASIAN </u></p>
									<h4 class="text-gray-900 mb-1">KANTOR IMIGRASI KELAS I TPI JAKARTA UTARA</h4>
								</div>

								<a href="<?= base_url('home/pengajuan') ?>" class="btn btn-user btn-block text-white" style="background-color: #275576;">
									<i class="far fa-edit"></i> Buat Permohonan
								</a>

								<a href="<?= base_url('home/search') ?>" class="btn btn-light btn-user btn-block mt-3">
									<i class="fas fa-print"></i> Cetak & Cek Permohonan
								</a>

								<div class="text-center mt-5">
									<a href="#" class="" data-toggle="modal" data-target="#panduanModal" style="color: #275576;">
										<small><u>Petunjuk penggunaan</u></small>
									</a>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

<!-- Panduan Modal-->
<div class="modal fade" id="started" tabindex="-1" role="dialog" aria-labelledby="startedLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="startedLabel">Panduan</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<center>SELAMAT DATANG DI PENDAFTARAN BAP PASPOR ONLINE (BAPPO)<br> KANTOR IMIGRASI KELAS I TPI JAKARTA UTARA</center><br>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true">Paspor Hilang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false">Paspor Rusak</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact1-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false">Perubahan Data</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home1-tab">
						<ol>
							<li>Nama Lengkap</li>
							<li>NIK (Upload e-KTP)</li>
							<li>Kartu Keluarga (Upload)</li>
							<li>Pilihan Ijazah/Akta Lahir/Buku Nikah (Upload)</li>
							<li>Surat Keterangan dari Kepolisian (Upload)</li>
							<li>Softcopy Paspor Lama (Upload Foto Halaman Biodata) </li>
						</ol>

						NB
						<ol>
							<li>Jika tidak ada foto halaman paspor, tuliskan lokasi tempat pembuatan paspor sebelumnya (Nama Kantor Imigrasi)</li>
							<li>Dokumen yang diupload harus dokumen asli atau berwarna </li>

						</ol>
					</div>
					<div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile1-tab">
						<ol>
							<li>Nama Lengkap</li>
							<li>NIK (Upload e-KTP)</li>
							<li>Kartu Keluarga (Upload)</li>
							<li>Pilihan Ijazah/Akta Lahir/Buku Nikah (Upload)</li>
							<li>Softcopy Paspor Lama (Upload Foto Halaman Biodata) </li>
							<li>Foto Kerusakan Paspor </li>
						</ol>

						NB
						<ol>
							<li>Surat Keterangan dari instansi Pemerintah terkait (Kelurahan/Kecamatan) apabila rusak karena bencana alam (force majeure) </li>
							<li>Dokumen yang diupload harus dokumen asli atau berwarna </li>
						</ol>
					</div>
					<div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact1-tab">
						<ol>
							<li>Nama Lengkap</li>
							<li>NIK (Upload e-KTP)</li>
							<li>Kartu Keluarga (Upload)</li>
							<li>Pilihan Ijazah/Akta Lahir/Buku Nikah (Upload)</li>
							<li>Nomor Paspor Lama (Upload Foto Halaman Identitas Paspor) </li>
							<li>Penetapan pengadilan yang memuat perubahan identitas dari pemegang paspor </li>
						</ol>
						NB
						<ol>
							<li>Pemeriksaan/ Wawancara wajib dilakukan di Kantor Imigrasi/Tatap muka</li>

						</ol>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Oke</button>
			</div>
		</div>
	</div>
</div>

<!-- Panduan Modal-->
<div class="modal fade" id="panduanModal" tabindex="-1" role="dialog" aria-labelledby="panduanModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="panduanModalLabel">Panduan</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- <ol>
                    <li>Silahkan klik tombol buat permohonan.</li>
                    <li>Lalu silahkan isi data permohoan. Kalau sudah klik simpan.</li>
                    <li>Silahkan download PDF, lalu print antrian tersebut.</li>
                    <li>Silahkan pergi ke Kantor Imigrasi sesuai dengan tanggal booking anda dengan membawa hasil print sebelumnya.</li>
                    <li>(opsional)Buat anda yang ingin mencetak antrian, silahkan klik cetak permohonan.</li>
                    <li>(opsional)Silahkan input NIK anda, lalu pilih tanggal antrian yang ingin anda cetak.</li>
                    <li>Cara cek berkas</li>
                    <li>Klik tombol Cetak & Cek Permohonan</li>
                    <li>Masukkan NIK yang telah terdfaftar </li>
                    <li>setelah muncul list klik detail</li>
                </ol> -->
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Petunjuk Penggunaan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Walk In</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Zoom</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<ol>
							<li>Silahkan klik tombol buat permohonan</li>
							<li>Lalu silahkan isi data permohoan. Kalau sudah klik simpan.</li>
							<li>Jika disetujui, lanjut proses pemeriksaan</li>
							<li>Jika ditolak,segera lengkapi permohonan</li>
							<li>Pilih jadwal pemeriksaan</li>
							<li>Silahkan download PDF, bukti penjadwalan</li>
							<li>Silahkan pergi ke Kantor Imigrasi sesuai dengan jadwal yang telah dipilih</li>
						</ol>

						Optional
						<ol>
							<li>Untuk cetak bukti pendaftaran silahkan klik "cetak permohonan".</li>
							<li>Input NIK dan pilih tanggal antrian untuk dicetak </li>
						</ol>

						Cara cek berkas:
						<ol>
							<li>Klik tombol Cetak & Cek Permohonan</li>
							<li>Masukkan NIK yang telah terdfaftar </li>
							<li>setelah muncul list klik detail</li>
						</ol>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<ol>
							<li>Klik tombol "Buat Permohonan" </li>
							<li>Isi data dan upload dokumen </li>
							<li>Pilih metode "Walk In" pada kolom Metode BAP</li>
							<li>Tunggu sampai berkas Terverifikasi</li>
							<li>Apabila sudah terverifikasi silahkan datang ke Kantor Imigrasi Kelas I TPI Jakarta Utara sesuai dengan jadwal yang dipilih dengan membawa dokumen asli</li>
						</ol>
					</div>
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
						<ol>
							<li>Khusus paspor terbitan Kantor Imigrasi Jakarta Utara </li>
							<li>Khusus pergantian paspor hilang dan rusak </li>
							<li>Mendaftar di aplikasi</li>
							<li>Wajib menggunakan pakaian yang sopan dan rapih serta harus dalam keadaan tenang </li>
							<li>Petugas dapat membatalkan jadwal pemeriksaan apabila pemohon dianggap tidak melaksanakan kewajiban pada poin nomor 4</li>
						</ol>

						NB

						<ol>
							<li>Download aplikasi ZOOM terlebih dahulu</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Oke</button>
			</div>
		</div>
	</div>
</div>