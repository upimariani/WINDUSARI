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
                <div class="checkout-form">
                    <!-- Form c_belanja/cekout -->
                    <form action="<?= base_url('c_belanja/take_in') ?>" method="POST">
                        <?php
                        $no_order = 'TI' . date('Ymd') . strtoupper(random_string('alnum', 8));
                        ?>
                        <input type="hidden" name="no_order" value="<?= $no_order ?>">
                        <input type="hidden" name="subtotal" value="<?= $this->cart->total(); ?>">
                        <div class="single-widget">
                            <h2>Pemesanan Atas Nama</h2>
                            <div class="content">
                                <ul>
                                    <li>Nama Penerima</li>
                                    <li><input type="text" name="nama_penerima" class="form-control">
                                        <?php echo form_error('nama_penerima', '<div class="error text-danger pl-3">', '</div>'); ?></li>
                                    <li>No Telepon</li>
                                    <li><input type="number" name="no_telp" class="form-control">
                                        <?php echo form_error('no_telp', '<div class="error text-danger pl-3">', '</div>'); ?></li>
                                    <hr>
                                    <li><strong> Total :</strong><span>Rp. <?= $this->cart->format_number($this->cart->total()); ?></span></li>
                                </ul>
                            </div>
                            <div class="single-widget">
                                <!-- Button Widget -->
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <button type="submit" class="btn">DELIVERY</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i = 1;
                                foreach ($this->cart->contents() as $items) {
                                    echo form_hidden('qty' . $i++, $items['qty']);
                                }
                                ?>
                                </from>
                                <!--/ End Button Widget -->
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>

                        <!--/ End Form -->
                </div>
            </div>

        </div>
</section>
<!--/ End Checkout -->