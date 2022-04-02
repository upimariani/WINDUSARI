<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?= base_url('c_katalog') ?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Pesanan Anda</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
            <div class="row">
                <div class="col-lg-12 col-16">
                    <div class="form-main">
                        <div class="container mt-3">
                            <h2><i class="fa fa-archive" aria-hidden="true"></i> Pesanan Anda</h2>
                            <br>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#belum_bayar">Belum Bayar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#konfirmasi">Menunggu Konfirmasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#dikemas">Dikemas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#dikirim">Dikirim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#selesai">Selesai</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="belum_bayar" class="container tab-pane active"><br>
                                    <!-- isi dari semua -->
                                    <div class="col-lg-12 col-16">
                                        <div class="main-sidebar">
                                            <!-- Single Widget -->
                                            <?php
                                            $no = 0;
                                            foreach ($belum_bayar as $key => $value) {
                                                $no = $no + $value->subtotal;
                                            }
                                            if ($no == 0) {
                                            ?>
                                                <div class="single-widget recent-post">
                                                    <!-- Single Post -->
                                                    <img style="width: 400px;" src="<?= base_url('asset/gambar/transaksi.png') ?>">

                                                    <!-- End Single Post -->
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="single-widget recent-post">
                                                    <h3 class="title">Belum Bayar</h3>
                                                    <!-- Single Post -->
                                                    <?php
                                                    $no = 0;
                                                    foreach ($belum_bayar as $value) {
                                                    ?>
                                                        <form action="<?= base_url('c_pesanan_pelanggan/dibatalkan/' . $value->no_order) ?>" method="POST">
                                                            <div class="single-post">
                                                                <div class="image">
                                                                    <a href="<?= base_url('c_pesanan_pelanggan/detail_pemesanan/' . $value->no_order) ?>">
                                                                        <p>No Order: <strong><?= $value->no_order ?></strong></p>
                                                                    </a>
                                                                </div>
                                                                <div class="content">
                                                                    <h5><a href="#"></a></h5>
                                                                    <ul class="comment">
                                                                        <li><i class="fa fa-calendar" aria-hidden="true"></i><?= $value->tgl_order ?></li>
                                                                        <li>Rp. <?= number_format($value->total_bayar, 0)  ?></li><br>
                                                                        <li><i class="fa fa-user"></i>Nama Penerima: <strong><?= $value->nama_penerima ?></strong></li><br>
                                                                        <li><i class="fa fa-barcode"></i>Kode Pembayaran : <strong>
                                                                                <h5><?= $value->kode_pembayaran ?></h5>
                                                                            </strong></li><br>
                                                                    </ul>
                                                                </div>
                                                                <div class="button">
                                                                    <br>
                                                                    <button type="submit" class="btn">BATALKAN PESANAN</button>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </form>
                                                    <?php
                                                    }
                                                    ?>
                                                    <!-- End Single Post -->
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- Akhir -->
                                </div>
                                <div id="konfirmasi" class="container tab-pane fade"><br>
                                    <!-- isi dari semua -->
                                    <div class="col-lg-12 col-16">
                                        <div class="main-sidebar">
                                            <?php
                                            $no = 0;
                                            foreach ($menunggu_konfirmasi as $key => $value) {
                                                $no = $no + $value->subtotal;
                                            }
                                            if ($no == 0) {
                                            ?>
                                                <div class="single-widget recent-post">
                                                    <!-- Single Post -->
                                                    <img style="width: 400px;" src="<?= base_url('asset/gambar/transaksi.png') ?>">

                                                    <!-- End Single Post -->
                                                </div>
                                            <?php
                                            } else { ?>
                                                <!-- Single Widget -->
                                                <div class="single-widget recent-post">
                                                    <h3 class="title">Menunggu Konfirmasi</h3>
                                                    <!-- Single Post -->
                                                    <?php
                                                    foreach ($menunggu_konfirmasi as $key => $value) {
                                                    ?>
                                                        <div class="single-post">
                                                            <div class="image">
                                                                <i class="fa fa-quote-left"></i>
                                                                <p>Pesanan dengan No Order <strong><a href="<?= base_url('c_pesanan_pelanggan/detail_pemesanan/' . $value->no_order) ?>"><?= $value->no_order ?></a></strong> sedang menunggu konfirmasi.</p>
                                                            </div>
                                                            <div class="content">
                                                                <ul class="comment">
                                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?= $value->tgl_order ?></li>
                                                                    <li>Rp. <?= number_format($value->total_bayar, 0) ?></li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                        <hr>
                                                    <?php }
                                                    ?>
                                                    <!-- End Single Post -->
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- Akhir -->
                                </div>
                                <div id="dikemas" class="container tab-pane fade"><br>
                                    <!-- isi dari semua -->
                                    <div class="col-lg-12 col-16">
                                        <div class="main-sidebar">
                                            <?php
                                            $no = 0;
                                            foreach ($dikemas as $key => $value) {
                                                $no = $no + $value->subtotal;
                                            }
                                            if ($no == 0) {
                                            ?>
                                                <div class="single-widget recent-post">
                                                    <!-- Single Post -->
                                                    <img style="width: 400px;" src="<?= base_url('asset/gambar/transaksi.png') ?>">

                                                    <!-- End Single Post -->
                                                </div>
                                            <?php
                                            } else { ?>
                                                <!-- Single Widget -->
                                                <div class="single-widget recent-post">
                                                    <h3 class="title">Dikemas</h3>
                                                    <!-- Single Post -->
                                                    <?php
                                                    foreach ($dikemas as $key => $value) {
                                                    ?>
                                                        <div class="single-post">
                                                            <div class="image">
                                                                <i class="fa fa-quote-left"></i>
                                                                <p>Pesanan dengan No Order <strong><a href="<?= base_url('c_pesanan_pelanggan/detail_pemesanan/' . $value->no_order) ?>"><?= $value->no_order ?></a></strong> sedang dikemas.</p>
                                                            </div>
                                                            <div class="content">
                                                                <ul class="comment">
                                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?= $value->tgl_order ?></li>
                                                                    <li>Rp. <?= number_format($value->total_bayar, 0) ?></li>
                                                                </ul>

                                                            </div>
                                                        </div>
                                                        <hr>
                                                    <?php }
                                                    ?>
                                                    <!-- End Single Post -->
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- Akhir -->
                                </div>
                                <div id="dikirim" class="container tab-pane fade"><br>
                                    <!-- isi dari semua -->
                                    <div class="col-lg-12 col-16">
                                        <div class="main-sidebar">
                                            <?php
                                            $no = 0;
                                            foreach ($dikirim as $key => $value) {
                                                $no = $no + $value->subtotal;
                                            }
                                            if ($no == 0) {
                                            ?>
                                                <div class="single-widget recent-post">
                                                    <!-- Single Post -->
                                                    <img style="width: 400px;" src="<?= base_url('asset/gambar/transaksi.png') ?>">

                                                    <!-- End Single Post -->
                                                </div>
                                            <?php
                                            } else { ?>
                                                <!-- Single Widget -->
                                                <div class="single-widget recent-post">
                                                    <h3 class="title">Dikirim</h3>
                                                    <!-- Single Post -->

                                                    <div class="single-post">
                                                        <?php
                                                        foreach ($dikirim as $key => $value) {
                                                        ?>
                                                            <div class="image">

                                                                <div class="container">
                                                                    <hr>
                                                                    <h6>
                                                                        Pesanan <a href="<?= base_url('c_pesanan_pelanggan/detail_pemesanan/' . $value->no_order) ?>"><?= $value->no_order ?></a> Sedang Dikirim
                                                                    </h6>
                                                                    <hr>
                                                                    <ul>
                                                                        <li><i class="fa fa-user"></i> Nama Penerima : <strong><?= $value->nama_penerima ?></strong></li>
                                                                        <li><i class="fa fa-money"></i> Total Pembayaran : Rp. <strong><?= number_format($value->total_bayar, 0)  ?></strong></li>
                                                                        <li><i class="fa fa-truck"></i> Jasa Pengiriman : <?= $value->nama_expedisi ?>, <?= $value->estimasi ?> </li>
                                                                        <li><i class="fa fa-map-marker"></i> Alamat : <?= $value->alamat ?> Kota. <?= $value->kota ?> Kode Pos. <?= $value->kode_pos ?> Prov. <?= $value->provinsi ?></li>
                                                                        <li>
                                                                            <br>
                                                                            <h6>NO. RESI <?= $value->no_resi ?></h6>
                                                                        </li>
                                                                    </ul><br>
                                                                    <a href="<?= base_url('c_pesanan_pelanggan/tracking/' . $value->no_order) ?>"><button type="button" class="btn">TRACKING</button></a>
                                                                    <a href="<?= base_url('c_pesanan_pelanggan/pesanan_diterima/' . $value->no_order) ?>"><button type="button" class="btn">PESANAN DITERIMA</button></a>
                                                                </div>

                                                            </div> <?php }
                                                                    ?>
                                                    </div>

                                                    <!-- End Single Post -->

                                                </div>
                                            <?php } ?>

                                        </div>

                                    </div>
                                    <!-- Akhir -->
                                </div>
                                <div id="selesai" class="container tab-pane fade"><br>
                                    <!-- isi dari semua -->
                                    <div class="col-lg-12 col-16">
                                        <div class="main-sidebar">
                                            <?php
                                            $no = 0;
                                            foreach ($selesai as $key => $value) {
                                                $no = $no + $value->subtotal;
                                            }
                                            if ($no == 0) {
                                            ?>
                                                <div class="single-widget recent-post">
                                                    <!-- Single Post -->
                                                    <img style="width: 400px;" src="<?= base_url('asset/gambar/transaksi.png') ?>">

                                                    <!-- End Single Post -->
                                                </div>
                                            <?php
                                            } else { ?>
                                                <!-- Single Widget -->
                                                <div class="single-widget recent-post">
                                                    <h3 class="title">Selesai</h3>
                                                    <!-- Single Post -->
                                                    <div class="single-post">
                                                        <?php
                                                        foreach ($selesai as $key => $value) {
                                                        ?>

                                                            <div class="image">
                                                                <div class="container">
                                                                    <hr>
                                                                    <h6>
                                                                        Pesanan <a href="<?= base_url('c_pesanan_pelanggan/detail_pemesanan/' . $value->no_order) ?>"><?= $value->no_order ?></a> Telah Diterima
                                                                    </h6>
                                                                    <hr>
                                                                    <ul>
                                                                        <li><i class="fa fa-user"></i> Nama Penerima : <strong><?= $value->nama_penerima ?></strong></li>
                                                                        <li><i class="fa fa-money"></i> Total Pembayaran : Rp. <strong><?= number_format($value->total_bayar, 0)  ?></strong></li>
                                                                    </ul><br>
                                                                    <a href="<?= base_url('c_pesanan_pelanggan/review/' . $value->no_order) ?>"><button type="button" class="btn">REVIEW PRODUK</button></a>
                                                                </div>

                                                            </div> <?php }
                                                                    ?>
                                                    </div>

                                                    <!-- End Single Post -->
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- Akhir -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Contact -->