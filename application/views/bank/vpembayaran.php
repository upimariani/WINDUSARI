<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Selamat Datang</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Apakah Anda Ingin Melakukan Transaksi? <?= $this->session->userdata('no_rekening'); ?></h3>
                            <br>
                            <?php
                            if ($this->session->flashdata('pesan')) {
                                echo '<div class="callout callout-success">';
                                echo $this->session->flashdata('pesan');
                                echo ' </div>';
                            }

                            ?>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo form_open('bank/c_bank/proses_pembayaran') ?>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kode Pembayaran</label>
                                <input type="text" name="kode_pembayaran" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Kode Pembayaran" required>
                                <div class="invalid-feedback">Testing</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Proses</button>
                            <?php echo form_close() ?>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->