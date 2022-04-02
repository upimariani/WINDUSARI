<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?= base_url('c_katalog') ?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Shop Grid</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Product Style -->
<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="shop-sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget category">
                        <h3 class="title">Produk</h3>
                        <ul class="categor-list">
                            <?php
                            foreach ($produk as $key => $value) {
                            ?>
                                <li><a href="<?= base_url('c_katalog/detail_produk/') . $value->id ?>"><?= $value->nama_produk ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                    <!--/ End Shop By Price -->
                    <!-- Single Widget -->
                    <div class="single-widget recent-post">
                        <h3 class="title">Produk Terlaris</h3>
                        <?php
                        foreach ($rank as $key => $value) {
                        ?>

                            <!-- Single Post -->
                            <div class="single-post first">
                                <div class="image">
                                    <img src="<?= base_url('asset/gambar/' . $value->gambar) ?>" alt="#">
                                </div>
                                <div class="content">
                                    <h5><a href="#"><?= $value->nama_produk ?></a></h5>
                                    <p class="price">Rp. <?= number_format($value->harga_produk, 0) ?></p>
                                    <ul class="reviews">
                                        <?php
                                        if ($value->rating == '0') {
                                        ?>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                        <?php
                                        } else if ($value->rating == '1') {
                                        ?>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                        <?php
                                        } else if ($value->rating == '2') {
                                        ?>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                        <?php
                                        } else if ($value->rating == '3') {
                                        ?>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                        <?php
                                        } else if ($value->rating == '4') {
                                        ?>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li><i class="ti-star"></i></li>
                                        <?php
                                        } else if ($value->rating == '5') {
                                        ?>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                            <li class="yellow"><i class="ti-star"></i></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Post -->
                        <?php
                        }
                        ?>

                        <!-- End Single Post -->
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <!--/ End Single Widget -->
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <?php foreach ($produk as $row) {
                    ?>
                        <div class="col-lg-3 col-md-6 col-12">
                            <?php
                            echo form_open('c_belanja/add');
                            echo form_hidden('redirect_page', str_replace('c_login', '', current_url()));
                            $harga_diskon = $row->harga_produk - ($row->besar_diskon / 100 * $row->harga_produk);
                            ?>
                            <input type="hidden" name="price" value="<?= $harga_diskon ?>">
                            <input type="hidden" name="name" value="<?= $row->nama_produk ?>">
                            <input type="hidden" name="id" value="<?= $row->id_diskon ?>">
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="netto" value="<?= $row->berat_produk ?>">
                            <input type="hidden" name="picture" value="<?= $row->gambar ?>">
                            <input type="hidden" name="qty_produk" value="<?= $row->qty_produk ?>">
                            <input type="hidden" name="id_kategori" value="<?= $row->id_kategori ?>">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="product-details.html">
                                        <img style="width: 200px; height: 250px;" class="default-img" src="<?= base_url('asset/gambar/' . $row->gambar) ?>" alt="#">
                                        <img style="width: 200px; height: 250px;" class="hover-img" src="<?= base_url('asset/gambar/' . $row->gambar) ?>" alt="#">
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a title="View Detail" href="<?= base_url('c_katalog/detail_produk/') . $row->id ?>"><i class=" ti-eye"></i><span>View Detail</span></a>

                                        </div>
                                        <div class="product-action-2">
                                            <button class="btn" title="Add to cart" <?php if ($row->qty_produk <= 2) {
                                                                                        echo 'disabled';
                                                                                    } ?>>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html"><?= $row->nama_produk; ?></a></h3>
                                    <div class="product-price">
                                        <?php
                                        if ($row->besar_diskon != '0') {
                                        ?>
                                            <span class="old">Rp. <?= number_format($row->harga_produk, 0) ?></span>
                                        <?php
                                        }
                                        ?>
                                        <span>Rp. <?= number_format($harga_diskon, 0); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Product Style 1  -->