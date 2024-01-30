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

$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
?>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-9 mt-2">

            <div><?php echo $this->session->flashdata('message'); ?></div>

            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo "Keranjang" ?></h6>
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
                                    <th>harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($booking as $b) : ?>
                                    <tr>
                                        <td><?php echo $b->no_penyewaan ?></td>
                                        <td><?php echo $b->nama_lapangan ?></td>
                                        <td>
                                            <?php echo convert_tanggal($b->tgl_jadwal) ?>
                                        </td>
                                        <td><?php echo $b->jam ?></td>
                                        <td><?php echo number_format($b->harga, 0, ',', '.') ?></td>
                                        <td>
                                            <a class="badge badge-danger text-white" href="<?= base_url('keranjang/delete/' . $b->id_penyewaan) ?>">Batal</a>
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

            <?php if ($booking) { ?>

                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <ol>
                            <li>
                                Transfer nominal pembayaran ke 893089695615256 Bank Mandiri atas nama CXXXXXV, sesuai nominal terhutang
                            </li>
                            <li>
                                Tulis keterangan dengan Kode Booking (apabila terdapat lebih dari 1 maka pisahkan dengan koma dan spasi)
                            </li>
                            <li>
                                Warning, lakukan pembayaran maximal 1 jam setelah kode booking terbit. Daftar booking akan hilang jika bukti pembayaran tidak segera dikirim
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <?php echo form_open_multipart('keranjang/konfirmasi'); ?>

                        <div class="form-group row">
                            <label for="harga" class="col-sm-2 col-form-label">Total Harga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="harga" name="harga" value="<?= number_format($total_harga, 0, '', '.') ?>" disabled>
                                <input type="hidden" class="form-control" id="harga" name="harga" value="<?= $total_harga ?>">
                                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $user['id'] ?>">
                                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gambar" class="col-sm-2 col-form-label">Kirim bukti Pembayaran</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                        </form>

                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- End of Main Content -->
    </div>
</div>
</div>