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
                                <h2 class="blog-title">Tracking Pesanan Anda <?= $tracking['data']->no_order ?></h2>
                                <div class="blog-meta">
                                    <span class="author"><a href="#"><i class="fa fa-archive" aria-hidden="true"></i><?= $tracking['data']->nama_expedisi ?> <?= $tracking['data']->estimasi ?> <?= $tracking['data']->paket ?></a></span>
                                    <br><span class="author"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><?= $tracking['data']->alamat ?> <?= $tracking['data']->kode_pos ?> <?= $tracking['data']->kota ?> <?= $tracking['data']->provinsi ?></a></span>
                                </div>
                            </div>
                        </div>
                        <div class="main-sidebar">
                            <!-- Single Widget -->
                            <!--/ End Single Widget -->
                            <!--/ End Single Widget -->

                            <?php
                            foreach ($tracking['tracking'] as $key => $value) {
                            ?>
                                <!-- Single Widget -->
                                <div class="single-widget recent-post">
                                    <h3 class="title"></h3>
                                    <!-- Single Post -->

                                    <div class="single-post">
                                        <div class="content">
                                            <ul class="comment">
                                                <li><i class="fa fa-check-circle-o" aria-hidden="true"></i><?= $value->status_pengiriman ?></li>
                                                <li><i class="fa fa-ellipsis-v" aria-hidden="true"></i><?= $value->keterangan ?></li>
                                            </ul>
                                            <ul class="comment">
                                                <li><?= $value->time ?></li>

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