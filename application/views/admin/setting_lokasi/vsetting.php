<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Setting Lokasi Windu Sari</h1>
                    <?php if ($this->session->flashdata('pesan')) {
                        echo ' <div class="callout callout-success">';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    } ?>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('Admin/c_setting_lokasi') ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" name="nama_toko" value="<?= $setting->nama_toko ?>" class="form-control">
                                    <?= form_error('nama_toko', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select name="provinsi" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kota</label>
                                    <select name="kota" class="form-control">
                                        <option value="<?= $setting->lokasi ?>"><?= $setting->lokasi ?> </option>
                                    </select>
                                    <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="text" name="no_telp" value="<?= $setting->no_telp ?>" class="form-control">
                                </div>
                                <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                <div class="form-group">
                                    <label>Alamat Toko</label>
                                    <input type="text" name="alamat_toko" value="<?= $setting->alamat_toko ?>" class="form-control">
                                </div>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <!-- /.card-body -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>