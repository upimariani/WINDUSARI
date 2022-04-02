<div class="modal-content">
    <div class="modal-header">
        <a class="close" href="<?= base_url('c_katalog/shopgrid') ?>" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></a>
    </div>
    <div class="modal-body">
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-8 col-sm-8 col-xs-8">
                <!-- Product Slider -->
                <!-- End Product slider -->
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">

                <div class="quickview-content">

                    <h2><?= $detail['produk']->nama_produk ?></h2>
                    <div class="quickview-ratting-review">
                        <div class="quickview-ratting-wrap">
                            <div class="quickview-ratting">
                                <?php
                                if ($detail['rating']->rating == '0') {
                                ?>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                <?php
                                } else if ($detail['rating']->rating == '1') {
                                ?>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                <?php
                                } else if ($detail['rating']->rating == '2') {
                                ?>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                <?php
                                } else if ($detail['rating']->rating == '3') {
                                ?>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                <?php
                                } else if ($detail['rating']->rating == '4') {
                                ?>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                <?php
                                } else if ($detail['rating']->rating == '5') {
                                ?>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                <?php
                                }
                                ?>

                            </div>
                            <a href="#"> (<?= $detail['jml_review']; ?> customer review)</a>
                        </div>
                        <div class="quickview-stock">
                            <span><i class="fa fa-check-circle-o"></i> <?= $detail['produk']->qty_produk ?> in stock</span>
                        </div>
                    </div>
                    <br>
                    <div class="product-gallery">
                        <div class="single-slider">
                            <img style="width: 20% ; border-radius: 30%;" src="<?= base_url('asset/gambar/' . $detail['produk']->gambar) ?>" alt="#">
                        </div>
                    </div>
                    <h3 class="hasil">Rp. <?= number_format($detail['produk']->harga_produk - ($detail['produk']->besar_diskon / 100 * $detail['produk']->harga_produk)); ?>

                    </h3>

                    <!--<h3><del class="harga_produk">Rp. <?= $detail['produk']->harga_produk ?></del></h3>-->


                    <div class=" quickview-peragraph">
                        <p><?= $detail['produk']->deskripsi ?></p>
                    </div>
                    <?php
                    echo form_open('c_belanja/add');
                    echo form_hidden('redirect_page', str_replace('c_login', '', current_url()));
                    ?>
                    <input type="hidden" class="id_kategori" name="id_kategori" value="<?= $detail['produk']->id_kategori ?>">
                    <input type="hidden" value="<?= $detail['produk']->nama_produk ?>" name="name">
                    <input type="hidden" value="<?= $detail['produk']->harga_produk - ($detail['produk']->besar_diskon / 100 * $detail['produk']->harga_produk) ?>" name="price" class="hasil">
                    <input class="netto" type="hidden" value="<?= $detail['produk']->berat_produk ?>" name="netto">
                    <input class="diskon" type="hidden" value="<?= $detail['produk']->besar_diskon ?>" name="diskon">
                    <input type="hidden" name="picture" value="<?= $detail['produk']->gambar ?>">
                    <input type="hidden" name="id" value="<?= $detail['produk']->id_diskon ?>">
                    <input type="hidden" name="qty_produk" class="qty_produk" value="<?= $detail['produk']->qty_produk ?>">

                    <div class="size">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <h5 class="title">Berat</h5>
                                <select id="dt_kategori" name="id">
                                    <?php
                                    foreach ($detail['kategori'] as  $value) {
                                    ?>
                                        <option data-diskon=<?= $value->besar_diskon ?> data-hasil="<?= $value->harga_produk - ($value->besar_diskon / 100 * $value->harga_produk)  ?>" data-netto=<?= $value->berat_produk ?> data-kategori=" <?= $value->id_kategori ?>" data-harga="Rp. <?php echo  number_format($value->harga_produk, 0); ?>" data-qty="<?= $value->qty_produk ?>" value="<?= $value->id_diskon  ?>" <?php if ($value->qty_produk <= 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                echo 'disabled';
                                                                                                                                                                                                                                                                                                                                                                                                                            } ?>><?= $value->berat_produk ?> gram</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="quantity">
                        <!-- Input Order -->
                        <div class="input-group">
                            <div class="button minus">
                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="qty">
                                    <i class="ti-minus"></i>
                                </button>
                            </div>
                            <input type="text" name="qty" class="input-number" data-min="1" data-max="1000" value="1">
                            <div class="button plus">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="qty">
                                    <i class="ti-plus"></i>
                                </button>
                            </div>
                        </div>
                        <!--/ End Input Order -->
                    </div>
                    <div class="add-to-cart">
                        <button class="btn">Add to cart</button>
                        <a href="#" class="btn min"><i class="ti-heart"></i></a>
                        <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <section class="blog-single section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="blog-single-main">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="comments">
                                                <h3 class="comment-title">Review</h3>
                                                <!-- Single Comment -->
                                                <?php
                                                foreach ($detail['review'] as $key => $value) {
                                                ?>
                                                    <div class="single-comment">
                                                        <img src="<?= base_url('asset/gambar/' . $value->gambar) ?>" alt="#">
                                                        <div class="content">
                                                            <h4><?= $value->nama_depan ?> <?= $value->nama_belakang ?><span><?= $value->time_review ?></span></h4>
                                                            <p><?= $value->isi_review ?></p>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <!-- End Single Comment -->
                                                <!-- Single Comment -->

                                                <!-- End Single Comment -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Start Blog Single -->

    <!--/ End Blog Single -->
</div>
<!-- Modal end -->