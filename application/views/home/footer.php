<!-- Start Footer Area -->
<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer social">
                        <h4>Contact</h4>
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
                            <p>WINDU SARI SINCE 2005</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
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
<!-- Nice Select JS -->
<script src="<?= base_url() ?>asset/eshop/eshop/js/nicesellect.js"></script>
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
<script type="text/javascript">
    $(function() {
        $("#btn_send_chat").click(function() {
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?= site_url('c_chatting/send_mgs_chat') ?>',
                data: {
                    'msg': $('#text_message_chat').val(),
                    'id_pelanggan': $('#text_id_pelanggan').val()
                },
                success: function(msg) {
                    console.log(msg);
                    alert('wow' + msg);
                    //$('.direct-chat-messages').append('<div class="single-comment"> <div class = "content"><h4> Anda <span>' + msg.time_chatting + ' </span></h4><p>' + msg.pelanggan_send + '</div> </div>');
                }
            });
            $('#text_message_chat').val('');
            $('#text_message_chat').focus();
        });
    });
</script>
<script>
    console.log = function() {}
    $("#dt_kategori").on('change', function() {
        $(".harga_produk").html($(this).find(':selected').attr('data-harga'));
        $(".harga_produk").val($(this).find(':selected').attr('data-harga'));

        $(".id_kategori").html($(this).find(':selected').attr('data-kategori'));
        $(".id_kategori").val($(this).find(':selected').attr('data-kategori'));

        $(".diskon").html($(this).find(':selected').attr('data-diskon'));
        $(".diskon").val($(this).find(':selected').attr('data-diskon'));

        $(".hasil").html("Rp. " + $(this).find(':selected').attr('data-hasil'));
        $(".hasil").val($(this).find(':selected').attr('data-hasil'));

        $(".netto").html($(this).find(':selected').attr('data-netto'));
        $(".netto").val($(this).find(':selected').attr('data-netto'));

        $(".qty_produk").html($(this).find(':selected').attr('data-qty'));
        $(".qty_produk").val($(this).find(':selected').attr('data-qty'));
        console.log($(this).find(':selected').attr('id-kategori'));
    });
</script>
<script>
    function highlightStar(obj, id) {
        removeHighlight(id);
        $('#rate-' + id + ' li').each(function(index) {
            $(this).addClass('highlight');
            if (index == $('#rate-' + id + ' li').index(obj)) {
                return false;
            }
        });
    }

    // event yang terjadi pada saat kita mengarahkan kursor kita ke sebuah object
    function removeHighlight(id) {
        $('#rate-' + id + ' li').removeClass('selected');
        $('#rate-' + id + ' li').removeClass('highlight');
    }

    function addRating(obj, id) {
        $('#rate-' + id + ' li').each(function(index) {
            $(this).addClass('selected');
            $('#rate-' + id + ' #rating').val((index + 1));
            if (index == $('#rate-' + id + ' li').index(obj)) {
                return false;
            }
        });
        $.ajax({
            url: "<?php echo base_url('berita/tambah_rating'); ?>",
            data: 'id=' + id + '&rating=' + $('#rate-' + id + ' #rating').val(),
            type: "POST"
        });
    }

    function resetRating(id) {
        if ($('#rate-' + id + ' #rating').val() != 0) {
            $('#rate-' + id + ' li').each(function(index) {
                $(this).addClass('selected');
                if ((index + 1) == $('#rate-' + id + ' #rating').val()) {
                    return false;
                }
            });
        }
    }
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>

<!-- Jquery -->

</body>

</html>