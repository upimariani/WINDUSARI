<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Contact</a></li>
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
                <div class="col-lg-8 col-12">
                    <div class="form-main">

                        <div class="title">
                            <?php echo $this->session->flashdata('pesan'); ?>
                            <h4>Bukti Pembayaran</h4>
                            <h3>Upload Bukti Pembayaran</h3>
                        </div>
                        <?php echo form_open_multipart('c_pesanan_pelanggan/bayar/' . $pesanan->id_transaksi);
                        ?>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Atas Nama<span>*</span></label>
                                    <input name="atas_nama" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Nama Bank<span>*</span></label>
                                    <input name="nama_bank" type="text" placeholder="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Nomor Rekening<span>*</span></label>
                                    <input name="no_rekening" type="text" placeholder="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Bukti Pembayaran<span>*</span></label>
                                    <input name="bukti_pembayaran" type="file" placeholder="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group button">
                                    <button type="submit" class="btn ">Kirim</button>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="single-head">
                        <div class="title">
                            <h4>Silahkan upload pembayaran Anda dengan Total Pembelanjaan Anda sebesar: </h4><br>
                            <hr>
                            <h3> Rp. <strong> <?= number_format($pesanan->total_bayar, 0)  ?></strong>
                                <h3>
                        </div>
                        <div class="single-info">

                            <ul>
                                <?php foreach ($rekening as $key => $value) {
                                ?>
                                    <i class="fa fa-phone"></i>
                                    <h4 class="title"><?= $value->nama_bank ?></h4>
                                    <li>No Rekening: <?= $value->no_rek ?></li>
                                    <li>Atas Nama: <strong><?= $value->atas_nama ?></strong></li>
                                    <br>
                                    <hr>
                                <?php
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Contact -->