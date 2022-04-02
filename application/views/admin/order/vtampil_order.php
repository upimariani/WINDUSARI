<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-10">
                <div class="col-sm-12">
                    <h1>Data Order Produk Delivery</h1>
                    <hr>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '  <div class="callout callout-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><i class="icon fas fa-check"></i>';
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
                <div class="col-8">
                    <div class="card">
                        <div class="container">
                            <br>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <?php
                                    $jml_masuk = $this->m_laporan->jml_belum_bayar();
                                    ?>
                                    <a class="btn btn-app nav-link active" data-toggle="pill" href="#home"> <i class="far fa-arrow-alt-circle-right"></i> Belum Bayar
                                        <?php if ($jml_masuk != '0') { ?>
                                            <span class="badge bg-danger"><?= $jml_masuk ?></span>
                                        <?php
                                        } ?></a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    $jml_konfirmasi = $this->m_laporan->jml_konfirmasi();
                                    ?>
                                    <a class="btn btn-app nav-link" data-toggle="pill" href="#menu1"><i class="fas fa-check"></i>Konfirmasi
                                        <?php
                                        if ($jml_konfirmasi != '0') {
                                        ?>
                                            <span class="badge bg-warning"><?= $jml_konfirmasi ?></span>
                                        <?php
                                        }
                                        ?></a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    $jml_diproses = $this->m_laporan->jml_dikemas();
                                    ?>
                                    <a class="btn btn-app nav-link" data-toggle="pill" href="#diproses"> <i class="fas fa-inbox"></i> Diproses
                                        <?php
                                        if ($jml_diproses != '0') {
                                        ?>
                                            <span class="badge bg-purple"><?= $jml_diproses ?></span>
                                        <?php
                                        }
                                        ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <?php
                                    $jml_dikirim = $this->m_laporan->jml_dikirim();
                                    ?>
                                    <a class="btn btn-app nav-link" data-toggle="pill" href="#dikirim"><i class="fas fa-truck"></i>Dikirim
                                        <?php
                                        if ($jml_dikirim != '0') {
                                        ?>
                                            <span class="badge bg-success"><?= $jml_dikirim ?></span>
                                        <?php
                                        }
                                        ?>
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="home" class="container tab-pane active"><br>
                                    <!-- /.card-header -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <h3>Pelanggan Belum Melakukan Pembayaran</h3><br>
                                                            <?php $pesan ?>
                                                            <table id="example1" class="example1 table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No.</th>
                                                                        <th class="text-center">Nomor Order</th>
                                                                        <th class="text-center">Nama Penerima</th>
                                                                        <th class="text-center">Total Belanja</th>
                                                                        <th class="text-center">Detail Order</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($belumbayar as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $i++ ?></td>
                                                                            <td><?= $value->no_order ?></td>
                                                                            <td><?= $value->nama_penerima ?><br><span class="badge bg-info"><?= $value->no_telp ?></span></td>
                                                                            <td>Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                                                            <td class="text-center">
                                                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#belum_bayar<?= $value->no_order ?>">
                                                                                    <i class="far fa-file-alt"></i></button>
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
                                <div id="menu1" class="container tab-pane fade"><br>
                                    <!-- /.card-header -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <h3>Meminta Konfirmasi Pembayaran</h3>
                                                            <button type="button" class="btn btn-default">
                                                                <i class="fas fa-folder-open"> Laporan Konfirmasi Order</i>
                                                            </button>
                                                            <br>
                                                            <br>
                                                            <table id="data_user" class="example1 table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No.</th>
                                                                        <th class="text-center">Nomor Order</th>
                                                                        <th class="text-center">Nama Penerima</th>
                                                                        <th class="text-center">Total Belanja</th>
                                                                        <th class="text-center">Detail Pembayaran</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($lap_konfirmasi as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $i++ ?></td>
                                                                            <td><?= $value->no_order ?></td>
                                                                            <td><?= $value->nama_penerima ?></td>
                                                                            <td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
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
                                <div id="diproses" class="container tab-pane fade"><br>
                                    <!-- /.card-header -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <h3>Produk Diproses</h3>
                                                            <button type="button" class="btn btn-default">
                                                                <i class="fas fa-folder-open"> Laporan Konfirmasi Order</i>
                                                            </button>
                                                            <br>
                                                            <br>
                                                            <table id="data_user2" class="example1 table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No.</th>
                                                                        <th class="text-center">Nomor Order</th>
                                                                        <th class="text-center">Nama Penerima</th>
                                                                        <th class="text-center">Total Belanja</th>
                                                                        <th class="text-center">Detail Pembelian</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $no = 1;
                                                                    foreach ($diproses as $key => $value) {
                                                                    ?>
                                                                        <tr>
                                                                            <form action="<?= base_url('Admin/c_order/detail_order_delivery/' . $value->no_order) ?>" method="post">
                                                                                <td><?= $no++ ?></td>
                                                                                <td><?= $value->no_order ?></td>
                                                                                <td><?= $value->nama_penerima ?></td>
                                                                                <td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
                                                                                <td class="text-center">
                                                                                    <button type="submit" name="generate" class="btn btn-default">
                                                                                        <i class="fas fa-receipt"></i></button>
                                                                                </td>

                                                                            </form>
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
                                <div id="dikirim" class="container tab-pane fade"><br>
                                    <!-- /.card-header -->
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3>Produk Sedang Dikirim</h3><br>
                                                        <div class="card_laporan_tracking card card-primary card-outline" style="display:none">
                                                            <div class="card-body box-profile">
                                                                <h3 class="profile-username text-center">LAPORAN TRACKING</h3>
                                                                <ul id="list_laporan_tracking" class="list_laporan_tracking list-group list-group-unbordered mb-3">

                                                                </ul>
                                                                <button type="button" id="hide_card" class="btn btn-primary"><i class="fas fa-caret-left"></i> | Kembali</button>
                                                            </div>
                                                            <!-- /.card-body -->
                                                        </div>


                                                        <hr>
                                                        <table id="data_user3" class="example1 table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">NAMA PENERIMA</th>
                                                                    <th class="text-center">EXPEDISI</th>
                                                                    <th class="text-center">PAKET</th>
                                                                    <th class="text-center">ESTIMASI</th>
                                                                    <th class="text-center">TRACKING</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($dikirim as $key => $value) {
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $value->nama_penerima ?></td>
                                                                        <td><?= $value->nama_expedisi ?></td>
                                                                        <td><?= $value->paket ?></td>
                                                                        <td><?= $value->estimasi ?></td>
                                                                        <td class="text-center">
                                                                            <button type="button" class="btn btn-info btn-no_order" data-order="<?= $value->no_order ?>"><?= $value->no_order ?></button>
                                                                        </td>
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
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                        </div>
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

<!-- The Modal Belum Melakukan Bayar-->
<?php
foreach ($belumbayar as $key => $value) {
?>
    <div class="modal fade" id="belum_bayar<?= $value->no_order ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Order</h4><br>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <table>
                                <tr>
                                    <td><strong><?= $value->no_order ?></strong></td>
                                </tr>
                                <tr>
                                    <td><?= $value->nama_penerima ?></td>
                                </tr>
                                <tr>
                                    <td><?= $value->no_telp ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <table>
                                <tr>
                                    <td>Date: <?= $value->tgl_order ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <h5>Alamat Pengiriman: </h5>
                            <?= $value->alamat ?>, <?= $value->kota ?> Kode Pos <?= $value->kode_pos ?>, <?= $value->provinsi ?>
                        </div>
                        <div class="col-md-7 ml-auto">
                            <h6>Expedisi: <?= $value->nama_expedisi ?> <?= $value->paket ?> <?= $value->estimasi ?></h6>
                            <h5>Ongkos Kirim : <strong><span class="badge bg-warning"> Rp. <?= number_format($value->ongkir, 0) ?></span></strong></h5>
                            <p>Berat: <?= $value->berat ?> gram</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 ml-auto">
                            <table class="table">
                                <tr>
                                    <td>Subtotal</td>
                                    <td>Rp. <?= number_format($value->subtotal, 0) ?></td>
                                </tr>
                                <tr>
                                    <td>Total Pembayaran</td>
                                    <td>
                                        <h5>Rp. <strong><span class="badge bg-success"><?= number_format($value->total_bayar, 0) ?></span></strong></h5>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
<?php
}
//akhir dari laporan pelanggan yang belum melakukan pembayaran
?>

<!-- The Modal Konfirmasi Pembayaran-->
<?php
foreach ($lap_konfirmasi as $key => $value) {
?>
    <div class="modal fade" id="konfirmasi<?= $value->no_order ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pembayaran</h4><br>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h5>Atas Nama <strong><?= $value->nama_penerima ?></strong> telah melakukan pembayaran dengan: </h5><br>
                    <table>
                        <tr>
                            <td width="150px">No Order</td>
                            <td><strong><?= $value->no_order ?></strong></td>
                        </tr>
                        <tr>
                            <td>Total Pembayaran</td>
                            <td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
                        </tr>
                    </table>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="<?= base_url('admin/c_order/proses_konfirmasi/' . $value->no_order) ?>" class="btn btn-primary"><i class="fas fa-check"></i> Konfirmasi</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- The Modal Barang Diproses-->
<?php
foreach ($diproses as $key => $value) {
?>
    <div class="modal fade" id="diproses<?= $value->no_order ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pembayaran</h4><br>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h4>hai</h4>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-check"></i> Konfirmasi</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-print"></i> Cetak</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>