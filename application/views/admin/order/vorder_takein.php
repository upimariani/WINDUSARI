<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-10">
                <div class="col-sm-12">
                    <h1>Data Order Take In</h1>
                    <hr>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo ' <div class="callout callout-success"><i class="fas fa-check"></i> ';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    } ?>
                    <a href="<?= base_url('Admin/c_order/selesai') ?>" class="btn btn-default">
                        <i class="fas fa-backward"> | Kembali</i>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="container">
                            <br>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <?php
                                    $jml_konfirmasi = $this->m_laporan->konfirmasi_takein();
                                    ?>
                                    <a class="btn btn-app nav-link active" data-toggle="pill" href="#konfirmasi"><i class="fas fa-check"></i>Konfirmasi
                                        <?php
                                        if ($jml_konfirmasi != '0') {
                                        ?>
                                            <span class="badge bg-danger"><?= $jml_konfirmasi ?></span>
                                        <?php
                                        }
                                        ?>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    $jml_diproses = $this->m_laporan->diproses_takein();
                                    ?>
                                    <a class="btn btn-app nav-link" data-toggle="pill" href="#proses"><i class="fas fa-spinner"></i>Diproses
                                        <?php
                                        if ($jml_diproses != '0') { ?>
                                            <span class="badge bg-warning"><?= $jml_diproses ?></span>
                                        <?php
                                        }
                                        ?>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    $jml_takein = $this->m_laporan->menunggu_takein();
                                    ?>
                                    <a class="btn btn-app nav-link" data-toggle="pill" href="#takein"><i class="fas fa-shopping-bag"></i>Menunggu Take In
                                        <?php
                                        if ($jml_takein != '0') {
                                        ?>
                                            <span class="badge bg-purple"><?= $jml_takein ?></span>
                                        <?php
                                        }
                                        ?>

                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="konfirmasi" class="container tab-pane active"><br>
                                    <!-- /.card-header -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="card">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <h3>Menunggu Konfirmasi</h3><br>
                                                            <table class="example1 table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No.</th>
                                                                        <th class="text-center">Nomor Order</th>
                                                                        <th class="text-center">Tanggal Order</th>
                                                                        <th class="text-center">Nama Penerima</th>
                                                                        <th class="text-center">Total Belanja</th>
                                                                        <th class="text-center">Konfirmasi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($konfirmasi_takein as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $i++ ?></td>
                                                                            <td><?= $value->no_order ?></td>
                                                                            <td><?= $value->tgl_order ?></td>
                                                                            <td><?= $value->nama_penerima ?><br>
                                                                                <span class="badge bg-success"><?= $value->no_telp ?></span>
                                                                            </td>
                                                                            <td class="text-center">Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                                                            <td class="text-center">
                                                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#konfirmasi<?= $value->no_order ?>">
                                                                                    <i class="fas fa-clipboard-check"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div id="proses" class="container tab-pane fade"><br>
                                    <!-- /.card-header -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="card">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <h3>Pesanan Diproses</h3>
                                                            <br>
                                                            <br>
                                                            <table class="example1 table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No.</th>
                                                                        <th class="text-center">Nomor Order</th>
                                                                        <th class="text-center">Tanggal Order</th>
                                                                        <th class="text-center">Nama Penerima</th>
                                                                        <th class="text-center">Total Belanja</th>
                                                                        <th class="text-center">Detail Order</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($proses['proses'] as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $i++ ?></td>
                                                                            <td><?= $value->no_order ?></td>
                                                                            <td><?= $value->tgl_order ?></td>
                                                                            <td><?= $value->nama_penerima ?></td>
                                                                            <td>Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                                                            <td class="text-center">
                                                                                <a href="<?= base_url('Admin/c_order/detail_order_takein/' . $value->no_order) ?>" type="button" class="btn btn-default">
                                                                                    <i class="fas fa-clipboard-check"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div id="takein" class="container tab-pane fade"><br>
                                    <!-- /.card-header -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="card">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <h3>Menunggu Take In</h3>
                                                            <br>
                                                            <br>
                                                            <table class="example1 table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No.</th>
                                                                        <th class="text-center">Nomor Order</th>
                                                                        <th class="text-center">Nama Penerima</th>
                                                                        <th class="text-center">Total Belanja</th>
                                                                        <th class="text-center">Selesai</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($takein as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $i++ ?></td>
                                                                            <td><?= $value->no_order ?></td>
                                                                            <td><?= $value->nama_penerima ?></td>
                                                                            <td>Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                                                            <td class="text-center">
                                                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#takein<?= $value->no_order ?>">
                                                                                    <i class="fas fa-thumbs-up"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- The Modal Barang Diproses-->
<?php
//modal tampil konfirmasi order takein
foreach ($konfirmasi_takein as $key => $value) {
?>
    <div class="modal fade" id="konfirmasi<?= $value->no_order ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Pemesanan</h4><br>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h6>No Order <strong><?= $value->no_order ?></strong><br> Atas Nama <?= $value->nama_penerima ?></h6>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="<?= base_url('Admin/c_order/konfirmasi/' . $value->no_order) ?>"> <button type="button" class="btn btn-block btn-outline-success btn-sm"><i class="fas fa-check"></i> Konfirmasi</button></a>

                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
//modal tampil konfirmasi order takein
foreach ($takein as $key => $value) {
?>
    <div class="modal fade" id="takein<?= $value->no_order ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Produk Order</h4><br>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h5>Apakah Pesanan Sudah Diambil?</h5>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="<?= base_url('Admin/c_order/selesai_takein/' . $value->no_order) ?>" type="button" class="btn btn-primary"><i class="fas fa-check"></i> Konfirmasi</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>