<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-shopping-cart"></i> <?= $title ?>
                            <small class="float-right">Tanggal: <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?></small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Transaksi</th>
                                    <th>Nama Penerima</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $grand_total = 0;
                                foreach ($laporan as $key => $value) {
                                    $grand_total = $grand_total + $value->total_bayar;
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->no_order ?></td>
                                        <td><?= $value->nama_penerima ?></td>
                                        <td>Rp.<?= number_format($value->subtotal, 0) ?></td>
                                        <td>Rp.<?= number_format($value->total_bayar) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <h3>Grand Total : Rp. <?= number_format($grand_total, 0) ?></h3>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                    </div>
                </div>
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </section>
</div>