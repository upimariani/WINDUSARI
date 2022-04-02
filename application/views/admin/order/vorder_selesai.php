<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Order</h1>
                    <hr><br>
                    <a href="<?= base_url('Admin/c_order/take_in') ?>" type="button" class="btn btn-default">
                        <i class="fas fa-shopping-bag"> | Take-In</i>
                    </a>
                    <a href="<?= base_url('Admin/c_order') ?>" class="btn btn-default">
                        <i class="fas fa-truck"> | Delivery</i>
                    </a>
                    <a href="<?= base_url('Admin/c_order/laporan') ?>" class="btn btn-default">
                        <i class="fas fa-book"> | Laporan</i>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Transaksi</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <?php
                                        $hasil = 0;
                                        foreach ($lap_order as $key => $value) {
                                            $hasil += $value->total_bayar;
                                        ?>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        $selesai = 0;
                                        foreach ($lap_selesai as $key => $value) {
                                            $selesai += $value->total_bayar;
                                        ?>
                                        <?php
                                        }
                                        ?>
                                        <span class="info-box-text text-center text-muted">Total Pembayaran Produk Masuk</span>
                                        <span class="info-box-number text-center text-muted mb-0">Rp. <?= number_format($hasil, 0) ?></span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Total Pelanggan Order</span>
                                        <span class="info-box-number text-center text-muted mb-0"><?= $jumlah ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Total Penjualan</span>
                                        <span class="info-box-number text-center text-muted mb-0">Rp. <?= number_format($selesai, 0) ?><span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4>Produk Selesai</h4>
                                <hr><br>
                                <div class="post">
                                    <div class="user-block">
                                        <span class="username">
                                            <a href="#"></a>
                                        </span>
                                        <span class="description"></span>
                                    </div>
                                    <table class="example1 table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th class="text-center">NO ORDER</th>
                                                <th class="text-center">NAMA PENERIMA</th>
                                                <th class="text-center">TOTAL PEMBAYARAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($lap_selesai as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->no_order ?></td>
                                                    <td><?= $value->nama_penerima ?></td>
                                                    <td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
                                                    <td> <a href="<?= base_url('Admin/c_order/detail_order_takein/' . $value->no_order) ?>" type="button" class="btn btn-default">
                                                            <i class="fas fa-clipboard-check"></i></a> </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>