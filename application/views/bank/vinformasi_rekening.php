<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Informasi</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Rekening Atas Nama <?= $this->session->userdata('nama_nasabah'); ?></h3>

                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="fas fa-id-card-alt"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <i class="ion ion-android-arrow-up text-success"></i> <?= $this->session->userdata('no_rekening'); ?>
                                    </span>
                                    <span class="text-muted">NO REKENING</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-warning text-xl">
                                    <i class="fas fa-money-check-alt"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?php
                                        foreach ($informasi as $key => $value) { ?>
                                            <i class="ion ion-android-arrow-up text-warning"></i>Rp. <?= number_format($value->saldo, 0)  ?>
                                        <?php
                                        }
                                        ?>
                                    </span>
                                    <span class="text-muted">SALDO</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-danger text-xl">
                                    <i class="fas fa-key"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <i class="ion ion-android-arrow-up text-danger"></i> <?= $this->session->userdata('pin'); ?>
                                    </span>
                                    <span class="text-muted">PIN ATM</span>
                                </p>
                            </div>
                            <div class="form-group">
                                <a href="<?= base_url('bank/c_bank/pembayaran') ?>"><button class="btn btn-primary  col-lg-12"><i class="far fa-hand-point-left"></i> | Kembali</button></a>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->