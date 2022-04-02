<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->
                        <?php foreach ($proses_pembayaran as $key => $value) {
                        ?>

                            <div class="time-label">
                                <span class="bg-red"><?= $value->tgl_order ?></span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-envelope bg-blue"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">Pembayaran Windu Sari</h3>

                                    <div class="timeline-body">
                                        <h4>Pembayaran Kamu Sebesar Rp. <?= number_format($value->total_bayar, 0)  ?></h4>
                                        No Order : <?= $value->no_order ?>
                                    </div>
                                    <div class="timeline-footer">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#bayar<?= $value->no_order ?>">Bayar</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- END timeline item -->

                        <!-- modal edit -->

    </section>
    <!-- modal bayar -->
    <?php foreach ($proses_pembayaran as $row) {
    ?>
        <div class="modal fade" id="bayar<?= $row->no_order ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Masukkan Nominal Pembayaran Anda</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form action="<?= base_url('bank/c_bank/bayar/' . $row->id_pelanggan . '/' . $row->no_order) ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="saldo" value="<?= $row->saldo ?>">
                                    <label for="exampleInputEmail1">No Rekening Anda : <?= $row->no_rekening ?></label>
                                    <label for="exampleInputEmail1">Total Pembayaran : Rp. <?= number_format($row->total_bayar, 0)  ?></label>
                                    <input type="text" name="nominal_bayar" class="form-control" id="exampleInputEmail1" required>
                                </div>
                            </div>


                            <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
    <!-- /.modal -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->