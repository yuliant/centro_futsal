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

<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-2">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo "Daftar Booking" ?></h6>
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
                                foreach ($booking as $b) : ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $b->nama_lapangan ?></td>
                                        <td>
                                            <?php echo convert_tanggal($b->tgl_jadwal) ?>
                                        </td>
                                        <td><?php echo $b->jam ?></td>
                                        <td>
                                            <?php if ($b->status_jadwal == 1) { ?>
                                                <a class="badge badge-warning text-dark" href="<?= base_url('keranjang') ?>">Check keranjang</a>
                                            <?php } elseif ($b->status_jadwal == 2) { ?>
                                                <a class="badge badge-danger text-dark" disabled>Gagal</a>
                                            <?php } else { ?>
                                                <a class="badge badge-light text-dark" disabled>Lunas</a>
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