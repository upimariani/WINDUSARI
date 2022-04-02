<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Checkout -->
<section class="shop checkout section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>LIST PRODUK</h2>
                        <div class="content">
                            <?php
                            $tot_berat = 0;
                            foreach ($this->cart->contents() as $items) {
                                $berat = $items['qty'] *  $items['netto'];
                                $tot_berat = $tot_berat + $berat;
                            ?>
                                <ul>
                                    <li>Nama Produk<span><?= $items['name'] ?></span></li>
                                    <li>Berat<span><?= $items['netto'] ?> gram</span></li>
                                    <li>Harga<span>Rp. <?= number_format($items['price'], 0) ?></span></li>
                                    <li>(+) Jumlah<span><?= $items['qty'] ?></span></li>
                                    <li class="last">Total<span><strong>Rp. <?= $this->cart->format_number($items['subtotal']); ?></strong></span></li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>TOTAL KERANJANG</h2>
                        <div class="content">
                            <ul>
                                <li>Berat Total<span><?= $tot_berat ?> gram</span></li>
                                <li>Sub Total<span>Rp. <?= $this->cart->format_number($this->cart->total()); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-widget get-button">
                        <div class="content">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    PILIH PENGIRIMAN
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="<?= base_url('c_belanja/jasa_pengiriman') ?>">DELIVERY</a>
                                    <a class="dropdown-item" href="<?= base_url('c_belanja/take_in') ?>">TAKE IN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Button Widget -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Checkout -->