<link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?= base_url('assets/') ?>tanda_tangan/js/jquery.signature.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>tanda_tangan/css/jquery.signature.css">
<style>
    .kbw-signature {
        width: 400px;
        height: 200px;
    }

    #sig canvas {
        width: 100% !important;
        height: auto;
    }
</style>
<div class="container-fluid">

    <div>
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col-lg-9 col-sm-11">

            <!-- Card all supplier-->
            <div class="col-lg-12 mt-3">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper("Tanda Tangan Berkas") ?></h6>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('home/upload_ttd') ?>" method="POST" enctype="multipart/form-data" autocomplete="off">

                            <div class="col-md-12">
                                <label class="" for="">Tanda tangan dibawah ini:</label>
                                <br />
                                <div id="sig"></div>
                                <br />
                                <button id="clear">Reset</button>
                                <textarea id="signature64" name="signed" style="display: none"></textarea>
                                <input type="hidden" name="id_pemohon_dd" value="<?= $pemohon->id_pemohon_dd ?>" readonly>
                                <input type="hidden" name="nama" value="<?= $pemohon->nama_pemohon ?>" readonly>
                            </div>

                            <br />

                            <div class="text-md-right">
                                <a href="<?= base_url('home/') ?>" class="btn btn-light mr-2">Kembali</a>
                                <button class="btn btn-primary" type="submit" id="save-btn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col"></div>
    </div>

</div>
</div>
<!-- End of Main Content -->
<script type="text/javascript">
    var sig = $('#sig').signature({
        syncField: '#signature64',
        syncFormat: 'PNG'
    });
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>