<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?= base_url('c_pesanan_pelanggan') ?>">Pesanan Saya<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Review</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Blog Single -->
<section class="blog-single section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="blog-single-main">
                    <div class="row">
                        <div class="col-lg-12 col-16">
                            <div class="form-main">
                                <h4>Ulasan Produk</h4>
                                <p>Beri penilaian kamu terhadap produk yang kamu beli agar mendapatkan point.</p>
                                <?php
                                $tot = 0;
                                foreach ($review as $key => $value) {
                                    $tot = $tot + $value->harga_produk;
                                }
                                if ($tot == 0) {
                                ?>
                                    <img src="<?= base_url('asset/gambar/transaksi.png') ?>">
                                <?php
                                } else {
                                ?>
                                    <br>
                                    <hr>
                                    <?php
                                    foreach ($review as $key => $value) {
                                    ?>
                                        <form action="<?= site_url('c_pesanan_pelanggan/insert_review/' . $value->id_review) ?>" method="post">
                                            <input type="hidden" name="no_order" value="<?= $value->no_order ?>">
                                            <input type="hidden" name="total" value="<?= $value->qty * $value->harga_produk ?>">
                                            <input type="hidden" name="id_pelanggan" value="<?= $value->id_pelanggan ?>">
                                            <input type="hidden" name="point" value="<?= $value->point ?>">
                                            <input type="hidden" name="id" value="<?= $value->id ?>">
                                            <?php $id = $value->id ?>
                                            <div class="col-12">
                                                <div class="content">
                                                    <h6><?= $value->nama_produk ?><span><br> Rp. <?= number_format($value->harga_produk, 0) ?></span></h6>
                                                    <p> Netto <?= $value->berat_produk ?></p>
                                                    <p>Hai, suka produk ini? Beri ulasan dan rekomendasikan produk ini ke pembeli lain!</p>
                                                    <div id='rate-0'>
                                                        <input type='hidden' name='rating' id='rating'>
                                                        <?php echo "
                                                        <ul class='star' onMouseOut=\"resetRating('0')\">"; //untuk menampilan value dari bintang
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= 0) {
                                                                $selected = "selected";
                                                            } else {
                                                                $selected = "";
                                                            }
                                                            echo "<li class='select' class='$selected' onmouseover=\" highlightStar(this,0)\" onmouseout=\"removeHighlight(0);\" onClick=\"addRating(this,0)\">&#9733;</li>";
                                                        }
                                                        echo "<ul>
                                                    </div> "; ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Your Review<span>*</span></label>
                                                        <textarea type="text" id="isi_review" name="isi_review" class="form-control" placeholder="masukkan penilaian kamu disini..."></textarea>
                                                    </div>

                                                    <br>
                                                    <div class="button">
                                                        <button id="btn_review" class="btn"><i class="fa fa-reply" aria-hidden="true"></i> REVIEW</button>
                                                    </div>
                                                    <br>
                                        </form>
                            </div>
                    <?php
                                    }
                                }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--/ End Contact -->