<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <?php
                $tot_qty = 0;
                foreach ($this->cart->contents() as $items) {
                    $tot_qty = $tot_qty + $items['qty'];
                }
                if ($tot_qty == 0) {
                ?>
                    <img style="display: block; margin-left: auto; margin-right: auto; width: 50%;" src="<?= base_url('asset/gambar/transaksi.png') ?>">
                <?php
                } else {
                ?>


                    <!-- Shopping Summery -->
                    <?php echo form_open('c_belanja/update'); ?>
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th class="text-center">Item Description</th>
                                <th class="text-center">Item Price</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">Sub-Total</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                <th class="text-center">Update Cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $tot_berat = 0;
                            foreach ($this->cart->contents() as $items) :
                                $berat = $items['qty'] * $items['netto'];
                                $tot_berat = $tot_berat + $berat;
                            ?>

                                <tr>
                                    <td class="product-des" data-title="Description">
                                        <?php echo $items['name']; ?>
                                    </td>
                                    <!--/ End Input Order -->
                                    <td id="price" class="price" data-title="Price"><?php echo $this->cart->format_number($items['price']); ?></td>
                                    <td class="qty" data-title="Qty">
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button class="btn btn-primary btn-number" data-type="minus" data-field="<?= $i . '[qty]' ?>">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input id="jml" type="text" name="<?= $i . '[qty]' ?>" class="input-number" data-min="1" data-max="<?= $items['qty_produk'] ?>" value="<?= $items['qty'] ?>">
                                            <div class="button plus">
                                                <button class="btn btn-primary btn-number" data-type="plus" data-field="<?= $i . '[qty]' ?>">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td id="dt_total" class=" total-amount" data-title="Total">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                    <td class="action" data-title="Remove"><a href="<?= base_url('c_belanja/delete/' . $items['rowid']) ?>"><i class="ti-trash remove-icon"></i></a></td>
                                    <td class="action"><button class="btn" href="<?= base_url('c_belanja/update/' . $items['rowid']) ?>">Update Cart</button></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo form_close(); ?>

                    <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></span></li>
                                    <li>Netto<span><?= $tot_berat ?> Gram</span></li>
                                </ul>
                                <div class="button5">
                                    <a href="<?= base_url('c_belanja/cekout') ?>" class="btn">Checkout</a>
                                    <a href="<?= base_url('c_katalog/shopgrid') ?>" class="btn">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            <?php
                }
            ?>
            </div>
        </div>

    </div>
</div>
<!--/ End Shopping Cart -->