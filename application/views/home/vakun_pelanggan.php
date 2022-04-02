<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="<?= base_url('c_katalog') ?>">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<!-- Start Contact -->
<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="form-main">
                        <div class="title">
                            <h4>Akun</h4>
                            <h3>Perbaharui Akun Pengguna</h3>
                            <?php
                            if ($this->session->userdata('pesan')) {
                                echo '<div class="alert alert-success" role="alert">';
                                echo $this->session->userdata('pesan');
                                echo '</div>';
                            }
                            ?>

                        </div>
                        <?php
                        foreach ($akun as $key => $value) {
                        ?>
                            <form class="form" method="post" action="<?= base_url('c_katalog/profil') ?>">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" name="id_pelanggan" value="<?= $value->id_pelanggan ?>">
                                            <label>Nama Depan<span>*</span></label>
                                            <input name="nama_depan" type="text" value="<?= $value->nama_depan ?>" placeholder="">
                                            <?php echo form_error('nama_depan', '<div class="error text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Belakang<span>*</span></label>
                                            <input name="nama_belakang" type="text" value="<?= $value->nama_belakang ?>" placeholder="">
                                            <?php echo form_error('nama_belakang', '<div class="error text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label>Email<span>*</span></label>
                                            <input name="email" type="email" value="<?= $value->email ?>" placeholder="">
                                            <?php echo form_error('email', '<div class="error text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Username<span>*</span></label>
                                            <input name="username" type="text" value="<?= $value->username ?>" placeholder="">
                                            <?php echo form_error('username', '<div class="error text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Password<span>*</span></label>
                                            <input name="password" type="text" value="<?= $value->password ?>" placeholder="">
                                            <?php echo form_error('password', '<div class="error text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn ">Perbaharui Akun</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="single-head">
                        <div class="single-info">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <h4 class="title">Akun Anda:</h4>
                            <ul>
                                <li><?= $value->nama_depan ?> <?= $value->nama_belakang ?></li>
                                <li>Username: <strong><?= $value->username ?></strong><br> Password: <strong><?= $value->password ?></strong></li>
                            </ul>
                        </div>
                        <div class="single-info">
                            <i class="fa fa-envelope-open"></i>
                            <h4 class="title">Email:</h4>
                            <ul>
                                <li><?= $value->email ?></li>
                            </ul>
                        </div>
                        <div class="single-info">
                            <i class="fa fa-diamond" aria-hidden="true"></i>
                            <h4 class="title">Level Member:</h4>
                            <ul>
                                <li>Point : <?= $value->point ?></li>
                                <li>Level Member : <?php if ($value->level_member == '1') {
                                                        echo 'Gold';
                                                    } else if ($value->level_member == '2') {
                                                        echo 'Silver';
                                                    } else {
                                                        echo 'Classic';
                                                    } ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
                        }
            ?>
            </div>
        </div>
    </div>
</section>
<!--/ End Contact -->