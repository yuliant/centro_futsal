<?php 

$this->load->library('Ciqrcode');
QRcode::png(
        $qr,
        $outfile = "assets/img/QR.png",
        $level = QR_ECLEVEL_H,
        $size = 6,
        $margin = 2
    ); 
?>

<!DOCTYPE html>
<html><head>
    <title>Print</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/css.css">
</head><body>
    <div>
        <table style="margin-top: 30px;">
            <tr>
                <td>
                    <img src="<?php echo base_url() ?>assets/img/pengayoman.png">
                </td>
                <td>
                    <img src="<?php echo base_url() ?>assets/img/Logo.png">
                </td>
            </tr>
        </table>
    </div>

    <div>
        <table style="margin-top: 90px; text-align: center;">
            <tr>
                <td>
                    <h3>
                        DIREKTORAT JENDERAL IMIGRASI
                    </h3>
                </td>
            </tr>
            <tr>
                <td>
                    KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA REPUBLIK INDONESIA
                </td>
            </tr>
        </table>
    </div>

    <div>
        <table style="margin-top: 40px;">
            <tr>
                <th>Nama Pemohon</th>
                <th> : </th>
                <th> <?php echo $nama ?></th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th> : </th>
                <th> <?php echo $tgl ?></th>
            </tr>
            <tr>
                <th>Jam</th>
                <th> : </th>
                <th> <?php echo $jam ?></th>
            </tr>
			<tr>
                <th>Metode BAP</th>
                <th> : </th>
                <th> <?php echo $metode_bap ?></th>
            </tr>
            <tr>
                <th>Unit Kerja</th>
                <th> : </th>
                <th> <?php echo $unit ?> </th>
            </tr>
        </table>
    </div>
    <table>
        <tr>
            <td>
                <img style="width: 120px;" src="<?php echo base_url() ?>assets/img//QR.png">
            </td>
        </tr>
    </table>
    <table style="margin-top: 120px;">
        <tr>
            <td>
                <a style="border: solid 1px; padding: 2px;"><?php echo $qr ?></a>
            </td>
        </tr>
    </table>
    <table style="margin-top: 30px;">
        <tr>
            <th>
                Tunjukkan bukti pendaftaran antrian paspor online ini kepada Petugas Unit Kerja
            </th>
        </tr>
    </table>
</body></html>