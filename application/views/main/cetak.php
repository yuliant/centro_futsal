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

<!DOCTYPE html>
<html><head>
    <title>Print</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/css.css">
</head><body>
    <div>
        <table style="margin-top: 90px; text-align: center;">
            <tr>
                <td>
                    <h3>
                        BUKTI BOOKING LAPANGAN
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    CENTRO FUTSAL
                </td>
            </tr>
        </table>
    </div>

    <div>
        <table style="margin-top: 40px; text-align: right;">
            <tr>
                <th>Nama</th>
                <th> : </th>
                <th> <?php echo $jadwal->name ?></th>
            </tr>
            <tr>
                <th>Nama Lapangan</th>
                <th> : </th>
                <th> <?php echo $jadwal->nama_lapangan ?></th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th> : </th>
                <th> <?php echo convert_tanggal($jadwal->tgl_jadwal) ?></th>
            </tr>
            <tr>
                <th>Jam</th>
                <th> : </th>
                <th> <?php echo $jadwal->jam ?></th>
            </tr>
            <tr>
                <th>No Penyewaan</th>
                <th> : </th>
                <th> <?php echo $jadwal->no_penyewaan ?> </th>
            </tr>
        </table>
    </div>
    <table style="margin-top: 30px;">
        <tr>
            <th>
                Tunjukkan bukti booking saat diminta oleh pengelola Centro Futsal
            </th>
        </tr>
    </table>
</body></html>