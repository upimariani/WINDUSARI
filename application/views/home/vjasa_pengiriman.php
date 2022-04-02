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
                    <form action="<?= base_url('c_belanja/jasa_pengiriman') ?>" method="POST">
                        <?php $no_order = 'D' . date('Ymd') . strtoupper(random_string('alnum', 8));
                        $bri = 'WSBRI' . strtoupper(random_string('alnum', 12));
                        $bjb = 'WSBJB' . strtoupper(random_string('alnum', 12));
                        ?>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="single-widget">

                                    <div class="content">
                                        <?php
                                        $tot_berat = 0;
                                        foreach ($this->cart->contents() as $items) {
                                            $berat = $items['qty'] *  $items['netto'];
                                            $tot_berat = $tot_berat + $berat;
                                        ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>Tujuan Pengiriman</h2>
                        <p>Dimohon untuk mengisi data dengan benar!!!</p>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Nama Penerima</label>
                                    <input type="text" name="nama_penerima" value="<?php echo set_value('nama_penerima'); ?>" class="form-control">
                                    <?= form_error('nama_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="number" name="tlp_penerima" value="<?php echo set_value('tlp_penerima'); ?>" class="form-control">
                                    <?= form_error('tlp_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select name="provinsi" class="form-control">
                                    </select>
                                    <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Kota/Kabupaten</label>
                                    <select name="kota" class="form-control">
                                    </select>
                                    <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Expedisi</label>
                                    <select name="expedisi" class="form-control">
                                    </select>
                                    <?= form_error('expedisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Paket</label>
                                    <select name="paket" class="form-control">
                                    </select>
                                    <?= form_error('paket', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" value="<?= set_value('alamat') ?>" name="alamat" class="form-control">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Jalan</label>
                                    <input type="text" value="<?= set_value('jalan') ?>" name="jalan" class="form-control">
                                    <?= form_error('jalan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Desa</label>
                                    <input type="text" value="<?= set_value('desa') ?>" name="desa" class="form-control">
                                    <?= form_error('desa', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" value="<?= set_value('rt') ?>" name="rt" class="form-control">
                                    <?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" value="<?= set_value('rw') ?>" name="rw" class="form-control">
                                    <?= form_error('rw', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" name="kode_pos" value="<?= set_value('kode_pos') ?>" class="form-control">
                                    <?= form_error('kode_pos', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- simpan transaksi -->
                        <input name="no_order" value="<?= $no_order ?>" hidden>
                        <input name="estimasi" hidden>
                        <input name="ongkir" hidden>
                        <input name="berat" value="<?= $tot_berat ?>" hidden>
                        <input name="subtotal" value="<?= $this->cart->total() ?>" hidden>
                        <input name="total_bayar" hidden>

                        <!-- simpan detail pembelian -->
                        <?php
                        $i = 1;
                        foreach ($this->cart->contents() as $items) {
                            echo form_hidden('qty' . $i++, $items['qty']);
                        }
                        ?>
                </div>
                <!--/ End Form -->
            </div>
            <div class="col-lg-4 col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>Total Keranjang</h2>
                        <div class="content">
                            <ul>
                                <li>Sub Total<span>Rp. <?= $this->cart->format_number($this->cart->total()); ?></span></li>
                                <li>Berat<span><?= $tot_berat ?> gram</span></li>
                                <li>Ongkir<span id="ongkir"></span></li>
                                <li class="last">Total<span id="total_bayar"></span></li>
                            </ul>
                        </div>
                        <div class="single-widget">
                            <h2>Metode Pembayaran</h2>
                            <div class="content">
                                <ul>
                                    <li><input type="radio" name="pembayaran" value="<?= $bjb ?>">
                                        BJB</li>
                                    <li><input type="radio" name="pembayaran" value="<?= $bri ?>">
                                        BRI</li>
                                    <?= form_error('pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button Widget -->
                <div class="single-widget get-button">
                    <div class="content">
                        <div class="button">
                            <button type="submit" class="btn">OK</button>
                        </div>
                    </div>
                </div>
                <!--/ End Button Widget -->

            </div>
            </form>
            <!-- /.modal -->
        </div>
    </div>
    </div>
</section>
<!--/ End Checkout -->

<!-- Start Footer Area -->
<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer social">
                        <h4>Get In Tuch</h4>
                        <!-- Single Widget -->
                        <div class="contact">
                            <ul>
                                <li>Jln. Ramajaksa</li>
                                <li>Lingk. Kramat Jaya</li>
                                <li>Kel. Winduherang Kec. Cigugur Kab. Kuningan</li>
                                <li>+628 5156 727 368</li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>WINDU SARI</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- /.modal -->
<!-- /End Footer Area -->
<script script src="<?= base_url() ?>asset/eshop/eshop/js/jquery.min.js">
</script>
<script src="<?= base_url() ?>asset/eshop/eshop/js/jquery-migrate-3.0.0.js"></script>
<script src="<?= base_url() ?>asset/eshop/eshop/js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/bootstrap.min.js"></script>
<!-- Color JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/colors.js"></script>
<!-- Slicknav JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/magnific-popup.js"></script>
<!-- Waypoints JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/finalcountdown.min.js"></script>
<!-- Nice Select JS 
<script src="<?= base_url() ?>asset/eshop/eshop/js/nicesellect.js"></script>-->
<!-- Flex Slider JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/easing.js"></script>
<!-- Active JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/active.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            //memasukkan data provinsi
            type: "POST",
            url: "http://localhost/WINDUSARI/c_raja_ongkir_pelanggan/provinsi",
            success: function(hasil_provinsi) {
                //console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        //memasukkan data kota

        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "http://localhost/WINDUSARI/c_raja_ongkir_pelanggan/kota",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });

        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "http://localhost/WINDUSARI/c_raja_ongkir_pelanggan/expedisi",
                success: function(hasil_expedisi) {
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });

        $("select[name=expedisi]").on("change", function() {
            //mendapatkan expedisi terpilih
            var expedisi_terpilih = $("select[name=expedisi]").val()

            //mendapatkan id kota tujuan terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            //mengambil data ongkos kirim
            var total_berat = <?= $tot_berat ?>;
            //alert(total_berat);
            $.ajax({
                type: "POST",
                url: "http://localhost/WINDUSARI/c_raja_ongkir_pelanggan/paket",
                data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    //console.log(hasil_paket);
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });
        $("select[name=paket]").on("change", function() {
            //menampilkan ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            var reverse = dataongkir.toString().split('').reverse().join(''),
                ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
            //alert(dataongkir);
            $("#ongkir").html("Rp. " + ribuan_ongkir)
            //menghitung total bayar
            var ongkir = $("option:selected", this).attr('ongkir');
            var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);

            var reverse2 = total_bayar.toString().split('').reverse().join(''),
                ribuan_total = reverse2.match(/\d{1,3}/g);
            ribuan_total = ribuan_total.join(',').split('').reverse().join('');
            $("#total_bayar").html("Rp. " + ribuan_total);

            //estimasi dan ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(total_bayar);
        });
    });
</script>
<!-- Jquery -->

</body>

</html>