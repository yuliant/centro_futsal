<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo "Status PUTUSAN" ?></h6>
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
                                <th>Tgl Putusan</th>
                                <th>Alasan BAP</th>
                                <th>Metode BAP</th>
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
                                    <td><?php echo date("d-m-Y", strtotime($b->tgl_kedatangan)) ?></td>
                                    <td><?php echo $b->alasan ?></td>
                                    <td><?php echo $b->metode_bap ?></td>
                                    <td>
                                        <?php if ($b->putusan == null) : ?>
                                            <a class="badge badge-success" href="<?php echo base_url(); ?>pemohon/putusan/input_putusan/<?php echo $b->id_pemohon_dd ?>">buat putusan</a>
                                        <?php endif ?>
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