<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Blog Single Sidebar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Blog Single -->
<section class="blog-single section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="blog-single-main">
                    <div class="row">
                        <div class="col-12">
                            <div class="comments">
                                <h3 class="comment-title">Chatting</h3>
                                <!-- Single Comment -->
                                <?php
                                foreach ($chat as $key => $value) {

                                    if ($value->pelanggan_send != null) {
                                ?>
                                        <div class="direct-chat-messages">
                                            <div class="single-comment">
                                                <div class="content">
                                                    <h4>Anda <span><?= $value->time_chatting ?></span></h4>
                                                    <p><?= $value->pelanggan_send ?></p>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    } else if ($value->admin_send != null) {
                                    ?>

                                        <div class="single-comment left">
                                            <div class="content">
                                                <h4 class="text-danger">Admin <span><?= $value->time_chatting ?></span></h4>
                                                <p><?= $value->admin_send ?></p>

                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>

                                <!-- End Single Comment -->
                                <!-- Single Comment -->

                                <!-- End Single Comment -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="reply">
                                <div class="reply-head">
                                    <h2 class="reply-title">Balas</h2>
                                    <!-- Comment Form -->
                                    <form class="form" action="#">
                                        <?php
                                        $id = $this->session->userdata('id_pelanggan');

                                        ?>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input type="text" name="message" id="text_message_chat" placeholder="Type Message ..." class="form-control">
                                                    <input type="hidden" id="text_id_pelanggan" name="id_pelanggan" value="<?= $id ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group button">
                                                    <button id="btn_send_chat" type="submit" class="btn">Kirim</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Comment Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                    //alert('wow' + msg);
                    $('.direct-chat-messages').append('<div class="single-comment"> <div class = "content"><h4> Anda <span>' + msg.time_chatting + ' </span></h4><p>' + msg.pelanggan_send + '</p></div></div>');
                }
            });
            $('#text_message_chat').val('');
            $('#text_message_chat').focus();
        });
    });
</script>