<body>
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title" style="opacity: 0.7;">Register Akun Pelanggan</h2>
                    <form method="POST" action="<?= base_url('c_login/register') ?>" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="nama_depan" id="name" placeholder="Nama Depan" value="<?= set_value('nama_depan'); ?>" />
                            <?= form_error('nama_depan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-accounts-list-alt"></i></label>
                            <input type="text" name="nama_belakang" id="name" placeholder="Nama Belakang" value="<?= set_value('nama_belakang'); ?>" />
                            <?= form_error('nama_belakang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-accounts"></i></label>
                            <input type="text" name="username" id="name" placeholder="Username" value="<?= set_value('username'); ?>" />

                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="name" placeholder="Email" value="<?= set_value('email'); ?>" />
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password" />
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="retry_password" id="pass" placeholder="Retry Password" />
                            <?= form_error('retry_password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="<?= base_url() ?>asset/login/images/login.png" alt="sing up image" width="100%"></figure>
                    <a href="<?= base_url('c_login'); ?>" class="signup-image-link">I am already akun</a>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= base_url() ?>asset/login/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>asset/login/js/main.js"></script>
</body>

</html>