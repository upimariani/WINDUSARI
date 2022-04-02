<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container">

        <div class="product-area section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Trending Item Member</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php
                    foreach ($trending as $key => $row) {
                    ?>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
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
                                        <img class="default-img" src="<?= base_url('asset/gambar/' . $row->gambar) ?>" alt="#">
                                        <img class="hover-img" src="<?= base_url('asset/gambar/' . $row->gambar) ?>" alt="#">
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a title="Quick View" href="<?= base_url('c_katalog/detail_produk/') . $row->id ?>"><i class=" ti-eye"></i><span>Quick Shop</span></a>

                                        </div>
                                        <div class="product-action-2">
                                            <button class="btn" title="Add to cart">Add to cart</button>
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
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->