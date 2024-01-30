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
                                    <th>Kode Booking</th>
                                    <th>Lapangan</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($booking as $b) : ?>
                                    <tr>
                                        <td><?php echo $b->no_penyewaan ?></td>
                                        <td>
                                            <a href="<?php echo base_url('info/lapangan_detail/') . encrypt_url($b->id_lapangan) ?>">
                                                <?php echo $b->nama_lapangan ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo convert_tanggal($b->tgl_jadwal) ?>
                                        </td>
                                        <td><?php echo $b->jam ?></td>
                                        <td>
                                            <a href="<?php echo base_url('assets/img/data/') . $b->bukti_bayar ?>" target="_blank">
                                                <img src="<?php echo base_url('assets/img/data/') . $b->bukti_bayar ?>" alt="" width="100" srcset="">
                                            </a>
                                        </td>
                                        <td>
                                            <?php if ($b->status == 0 && !$b->bukti_bayar) { ?>
                                                <a class="badge badge-warning text-dark" href="<?= base_url('keranjang') ?>">Check keranjang</a>
                                            <?php } elseif ($b->status == 0 && $b->bukti_bayar) { ?>
                                                <a class="badge badge-light text-dark" disabled>Tunggu Konfirmasi</a>
                                            <?php } elseif ($b->status == 2) { ?>
                                                <a class="badge badge-danger text-white" disabled>Ditolak</a>
                                            <?php } elseif ($b->status == 1) { ?>
                                                <a class="badge badge-light text-dark" disabled>Lunas</a>
                                                <a class="badge badge-info text-white" href="<?= base_url('info/cetak/') . encrypt_url($b->id_penyewaan) ?>">Cetak</a>
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