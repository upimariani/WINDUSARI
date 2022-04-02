<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ATM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="<?= base_url('asset/AdminLTE/') ?>index2.html"><b>ATM MACHINE</b></a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">Masukkan Pin Anda
        </div>



        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
            </div>
            <!-- /.lockscreen-image -->

            <!-- lockscreen credentials (contains the form) -->
            <form action="<?= base_url('bank/c_bank/login') ?>" method="POST" class="lockscreen-credentials">
                <div class="input-group">
                    <input type="password" name="pin" class="form-control" placeholder="password" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
                    </div>
                    <!-- /.lockscreen credentials -->

                </div>
                <?php
                if ($this->session->flashdata('error')) {
                ?>
                    <script type='text/javascript'>
                        alert('<?= $this->session->flashdata('error'); ?>');
                    </script>
                <?php
                }
                ?>
                <?php
                if ($this->session->flashdata('pesan')) {
                ?>
                    <script type='text/javascript'>
                        alert('<?= $this->session->flashdata('pesan'); ?>');
                    </script>
                <?php
                }
                ?>



            </form>
            <!-- /.lockscreen-item -->
        </div>
        <!-- /.center -->

        <!-- jQuery -->
        <script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>