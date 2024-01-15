<div class="container-fluid">

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <!-- <div class="row"> -->
    <div class="col"></div>
    <!-- <div class="col-lg-10 col-sm-10"> -->
    <div class="">

        <!-- Card all supplier-->
        <div class="col-lg-12 mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("cari") ?></h6>
                </div>
                <div class="card-body">
                    <form action="" method="get">

                        <div class="form-group row">
                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nik" name="nik">
                            </div>
                        </div>

                        <div class="text-md-right">
                            <button class="btn btn-primary" type="submit" id="save-btn">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Card all supplier-->
        <div class="col-lg-12 mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("Cek Permohonan") ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIK</th>
                                    <th>Metode BAP</th>
                                    <th>Tgl Kedatangan</th>
                                    <th>Status</th>
                                    <th>Tgl Pengajuan</th>
                                    <th>Tgl Verifikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($kedatangan as $b) : ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $b->nik ?></td>
                                        <td><?php echo $b->metode_bap ?></td>
                                        <td><?php echo $b->tgl_kedatangan ?></td>
                                        <td><?php
                                            if ($b->status_laporan == 1) {
                                                echo "Tahap " . "Pendaftaran";
                                            } elseif ($b->status_laporan == 2) {
                                                echo "Tahap " . "Cek Berkas";
                                            } elseif ($b->status_laporan == 3) {
                                                echo "Tahap " . "Pemeriksaan";
                                            } elseif ($b->status_laporan == 4) {
                                                echo "Tahap " . "BAP";
                                            } else {
                                                echo "Tahap " . "Putusan";
                                            }
                                            ?></td>
                                        <td><?php echo $b->tgl_dibuat ?></td>
                                        <td><?php echo $b->tgl_ubah_status ?></td>
                                        <td>
                                            <?php if ($b->tgl_kedatangan) { ?>
                                                <a class="badge badge-success" href="<?php echo base_url(); ?>home/cetak/<?php echo $b->kode_pendaftaran ?>" target="_blank">Cetak</a>
                                            <?php } ?>
                                            <a class="badge badge-warning" href="<?php echo base_url(); ?>home/detail/<?php echo encrypt_url($b->id_pemohon_dd) ?>">Detail</a>
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
    <div class="col"></div>
    <!-- </div> -->

</div>
</div>
<!-- End of Main Content -->