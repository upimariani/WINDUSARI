<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Detail Order Take In</h1><br>
                    <a href="<?= base_url('Admin/c_order/take_in') ?>" class="btn btn-default">
                        <i class="fas fa-backward"> | Kembali</i>
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <?php
                                foreach ($proses['proses'] as $key => $value) {
                                ?>

                                    <h4>
                                        <i class="fas fa-barcode"></i> <?= $value->no_order ?>
                                        <small class="float-right">Date: <?= $value->tgl_order ?></small>
                                    </h4><br>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Atas Nama <strong><?= $value->nama_penerima ?></strong><br>
                                No Telepon <strong><?= $value->no_telp ?></strong><br>
                                <br>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Pengiriman Take In<br>

                                Pembayaran COD
                                <address>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    <?php
                                }
                    ?>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Nama Produk</th>
                                        <th>Berat Produk</th>
                                        <th>Harga Produk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($detail_order as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $value->qty ?></td>
                                            <td><?= $value->nama_produk ?></td>
                                            <td><?= $value->berat_produk ?> gram</td>
                                            <td>Rp. <?= number_format($value->harga_produk, 0) ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <?php
                                    foreach ($proses['proses'] as $key => $value) {
                                    ?>
                                        <tr>
                                            <th>Total:</th>
                                            <td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
                                        </tr>
                                </table>

                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="<?= base_url('Admin/c_order/take_in') ?>" class="btn btn-default"><i class="fas fa-backward"></i> Kembali </a>
                            <a href="<?= base_url('Admin/c_order/update_menunggu/' . $value->no_order) ?>"><button class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-thumbs-up"></i> Selesai
                                </button></a>
                        <?php
                                    }
                        ?>
                        </div>
                    </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>