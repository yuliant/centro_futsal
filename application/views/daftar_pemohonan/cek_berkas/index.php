<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo "Status CEK BERKAS" ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Tgl Pengajuan</th>
                                <th>Tgl verifikasi</th>
                                <th>Tanggal BAP</th>
                                <th>Status</th>
                                <th>Alasan BAP</th>
                                <th>Metode BAP</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($pemohon as $b) : ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><a href="<?php echo base_url(); ?>pemohon/detail/index/<?php echo $b->id_pemohon_dd ?>"><?php echo $b->nama_pemohon ?></a></td>
                                    <td><?php echo $b->nik ?></td>
                                    <td><?php echo $b->tgl_dibuat ?></td>
                                    <td><?php echo $b->tgl_ubah_status ?></td>
                                    <td><?= ($b->tgl_kedatangan) ? date("d-m-Y", strtotime($b->tgl_kedatangan)) : "<i>belum ada jadwal</i>" ?></td>
                                    <td><?php if ($b->status == 1) {
                                            echo "Diterima";
                                        } elseif ($b->status == 2) {
                                            echo "<span class='text-danger'>Ditolak</span>";
                                        } else {
                                            echo "<span class='text-warning'>Belum putusan</span>";
                                        } ?></td>
                                    <td><?php echo $b->alasan ?></td>
                                    <td><?php echo $b->metode_bap ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-success mb-1" href="<?php echo base_url(); ?>pemohon/cek_berkas/setujui/<?php echo $b->id_pemohon_dd ?>" onclick="return confirm('Apakah anda yakin ingin menyetujui data ini?');">Setujui</a>
                                        <a class="btn btn-sm btn-danger mb-1" href="<?php echo base_url(); ?>pemohon/cek_berkas/tolak/<?php echo $b->id_pemohon_dd ?>" onclick="return confirm('Apakah anda yakin ingin menolak data ini?');">Tolak</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning mb-1" href="<?php echo base_url(); ?>pemohon/pendaftar/edit/<?php echo $b->id_pemohon_dd ?>">edit</a>
                                        <a class="btn btn-sm btn-danger" mb-1 href="<?php echo base_url(); ?>pemohon/pendaftar/delete/<?php echo $b->id_pemohon_dd ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data pendaftaran ini?');">delete</a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
<!-- End of Main Content -->