<body>
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><a href="<?= base_url() ?>"><img src="asset/login/images/login.png" alt="sing up image"></a></figure>

                </div>
                <div class="signin-form">
                    <h2 class="form-title" style="opacity: 0.7;">Login</h2>
                    <h4> <?= $this->session->flashdata('error'); ?></h4>
                    <h4> <?= $this->session->flashdata('pesan'); ?></h4>
                    <form class="register-form" method="POST" action="<?= base_url('c_login'); ?>">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="your_name" placeholder="Username" value="<?= set_value('username'); ?>" />
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Password" />
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="label-agree-term"><span><span></span></span><a href="<?= base_url('c_login/register'); ?>">Registrasi</a></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- JS -->
    <script src="<?= base_url() ?>asset/login/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>asset/login/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>