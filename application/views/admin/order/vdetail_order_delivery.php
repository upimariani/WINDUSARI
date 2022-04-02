<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Detail Order</h1><br>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
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
                                foreach ($data_order as $key => $value) {
                                ?>

                                    <h4>
                                        <i class="fas fa-barcode"></i> <?= $value->no_order ?>
                                        <small class="float-right">Date: <?= $value->tgl_order ?></small>
                                        <br>
                                    </h4><br>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong><?= $value->nama_penerima ?></strong><br>
                                    <?= $value->alamat ?><br>
                                    <?= $value->kode_pos ?><br>
                                    <?= $value->kota ?>, <?= $value->provinsi ?><br>
                                    Phone: <?= $value->no_telp ?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Pengiriman
                                <address>
                                    <strong><?= $value->nama_expedisi ?></strong><br>
                                    Paket: <?= $value->paket ?><br>
                                    Estimasi: <?= $value->estimasi ?><br>
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
                                            <td>Rp. <?= number_format($value->harga_produk, 0)  ?></td>
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
                                    foreach ($data_order as $key => $value) {
                                    ?>
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>Rp. <?= number_format($value->subtotal, 0) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ongkir</th>
                                            <td>Rp. <?= number_format($value->ongkir, 0)  ?></td>
                                        </tr>
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
                            <a href="<?= base_url('Admin/c_order') ?>" class="btn btn-default"><i class="fas fa-backward"></i> Kembali </a>
                            <button type="button" data-toggle="modal" data-target="#no_resi<?= $value->no_order ?>" class="btn btn-success float-right"><i class="far fa-credit-card"></i> No Resi
                            </button>
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


    <!-- The Modal Barang Diproses-->
    <?php
    foreach ($data_order as $key => $value) {
    ?>
        <div class="modal fade" id="no_resi<?= $value->no_order ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Masukkan No Resi</h4><br>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('Admin/c_order/kirim/' . $value->no_order)
                        ?>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Resi</label>
                            <input type="text" name="no_resi" class="form-control" id="exampleInputPassword1" placeholder="Masukkan No Resi" required>

                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> OK</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    <?php } ?>