<?php
function convert_tanggal($tanggal_input)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal_input);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 mt-2">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo base_url('assets/img/data/') . $b->gambar ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href=""><?php echo $b->nama_lapangan ?></a>
                    </h5>
                    <p class="card-text ml-auto small text-start">Rp
                        <b class="text-danger">
                            <?php echo number_format($b->harga, 0, ',', '.'); ?>
                        </b> per Jam
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-end align-items-center">
                    <a href="<?php echo base_url('info/lapangan/') ?>" class="btn btn-secondary justify-content-right">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-9 mt-2">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo "Jadwal ($b->nama_lapangan)" ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Lapangan</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($jadwal as $b) : ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $b->nama_lapangan ?></td>
                                        <td>
                                            <?php echo convert_tanggal($b->tgl_jadwal) ?>
                                        </td>
                                        <td><?php echo $b->jam ?></td>
                                        <td>
                                            <?php if ($b->status_jadwal == 0) { ?>
                                                <a class="badge badge-primary" href="<?php echo base_url(); ?>info/booking/<?= encrypt_url($b->id_lapangan) ?>/<?php echo encrypt_url($b->id_jadwal) ?>">booking</a>
                                            <?php } elseif ($b->status_jadwal == 1) { ?>
                                                <a class="badge badge-light text-dark" disabled>booked</a>
                                            <?php } else { ?>
                                            <?php } ?>
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
        <!-- End of Main Content -->
    </div>
</div>
</div>