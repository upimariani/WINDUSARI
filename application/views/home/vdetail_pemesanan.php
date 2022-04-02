<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?= base_url('c_pesanan_pelanggan') ?>">Pesanan Saya<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">View Detail Pesanan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Blog Single -->
<section class="blog-single section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-single-main">
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-detail">
                                <h2 class="blog-title">Detail Pesanan Anda <?= $detail['data']->no_order ?></h2>
                                <div class="blog-meta">
                                    <span class="author"><a href="#"><i class="fa fa-user"></i><?= $detail['data']->nama_penerima ?></a><a href="#"><i class="fa fa-calendar"></i><?= $detail['data']->tgl_order ?></a><a href="#"><i class="fa fa-comments"></i><?= $detail['data']->total_bayar ?></a></span>
                                </div>
                            </div>
                        </div>
                        <div class="main-sidebar">
                            <!-- Single Widget -->
                            <!--/ End Single Widget -->
                            <!--/ End Single Widget -->

                            <?php
                            foreach ($detail['detail'] as $key => $value) {
                            ?>
                                <!-- Single Widget -->
                                <div class="single-widget recent-post">
                                    <h3 class="title"><?= $value->nama_produk ?></h3>
                                    <!-- Single Post -->

                                    <div class="single-post">
                                        <div class="image">
                                            <img src="<?= base_url('asset/gambar/' . $value->gambar) ?>" alt="#">
                                        </div>
                                        <div class="content">
                                            <ul class="comment">
                                                <li><i class="fa fa-check-circle-o" aria-hidden="true"></i><?= $value->qty ?> x Rp. <?= number_format($value->harga_produk, 0)  ?></li>
                                                <li><i class="fa fa-ellipsis-v" aria-hidden="true"></i>Rp. <?= number_format($value->qty * $value->harga_produk, 0) ?></li>
                                            </ul>
                                            <ul class="comment">
                                                <li>Netto: <strong><?= $value->berat_produk ?></strong> gram</li>

                                            </ul>
                                        </div>
                                    </div>

                                    <!-- End Single Post -->
                                    <!-- End Single Post -->
                                </div>
                            <?php
                            }
                            ?>
                            <!--/ End Single Widget -->
                            <!-- Single Widget -->
                            <!--/ End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
            </div>
        </div>
    </div>
</section>
<!--/ End Blog Single -->