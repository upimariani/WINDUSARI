<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Kelola Data Bank <?= $this->session->userdata('nama_user'); ?></h1>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo ' <div class="callout callout-success">';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    } ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Masukkan Data Nasabah</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?= base_url('bank/c_bank/insert_nasabah') ?>" method="post">
                                <!-- /.col -->

                                <div class="form-group">
                                    <label>NO REKENING*</label>
                                    <input type="text" name="no_rekening" class="form-control" data-inputmask="'mask': ['9999-99-999999-99-9']" data-mask>
                                    <?= form_error('no_rekening', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>NAMA NASABAH*</label>
                                    <input type="text" name="nama_nasabah" class="form-control" value="<?= set_value('nama_nasabah') ?>" placeholder="Masukkan Nama Nasabah">
                                    <?= form_error('nama_nasabah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>PIN*</label>
                                    <input type="text" name="pin" class="form-control" data-inputmask="'mask': ['999999']" data-mask>
                                    <?= form_error('pin', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>ATAS NAMA PELANGGAN*</label>
                                    <select class="form-control" name="pelanggan">
                                        <option>---Pilih Atas Nama Pelanggan---</option>
                                        <?php
                                        foreach ($pelanggan as $key => $value) {
                                        ?>
                                            <option value="<?= $value->id_pelanggan ?>"><?= $value->nama_depan ?> <?= $value->nama_belakang ?> | <?= $value->email ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                </div>
                            </form>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                    </div>

                    <!-- /.row -->
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Informasi Nasabah</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table id="kelola_bank" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">NO REKENING</th>
                                        <th class="text-center">NAMA NASABAH</th>
                                        <th class="text-center">SALDO</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($tampil as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->no_rekening ?></td>
                                            <td><?= $value->nama_nasabah ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#demo<?= $value->id_bank ?>"><i class="fas fa-plus"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#info<?= $value->id_bank ?>"> <i class="fas fa-info"></i></button>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#delete<?= $value->id_bank ?>"><i class="fas fa-trash-alt"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit<?= $value->id_bank ?>"><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Visit <a href="https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox#readme">Bootstrap Duallistbox</a> for more examples and information about
                    the plugin.
                </div>
            </div>
            <!-- /.card -->

            <!-- /.card -->
        </div>
        <!-- modal tambah saldo -->
        <?php
        foreach ($tampil as $key => $value) {
        ?>
            <div class="modal fade" id="demo<?= $value->id_bank ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Saldo Rekening <?= $value->no_rekening ?></h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- form start -->
                            <form action="<?= base_url('bank/c_bank/insert_saldo/' . $value->id_bank) ?>" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nominal</label>
                                        <input type="hidden" name="saldo" value="<?= $value->saldo ?>">
                                        Rp. <input type="text" name="nominal" class="form-control" placeholder="Masukkan Jumlah Nominal" required>
                                        <div class="invalid-feedback">Testing</div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php
        }
        ?>
        <?php
        foreach ($tampil as $key => $value) {
        ?>
            <div class="modal fade" id="info<?= $value->id_bank ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Informasi Rekening <?= $value->no_rekening ?></h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Saldo Anda Sebesar Rp. <?= number_format($value->saldo, 0) ?></label>
                                    <div class="invalid-feedback">Testing</div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php
        }
        ?>
        <?php
        foreach ($tampil as $key => $value) {
        ?>
            <div class="modal fade" id="delete<?= $value->id_bank ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Rekening <?= $value->no_rekening ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('bank/c_bank/delete/' . $value->id_bank) ?>" method="POST">
                            <div class="modal-body">
                                <!-- form start -->
                                <div class="card-body">
                                    <p>Apakah Anda Yakin Menghapus Data Rekening Atas Nama <strong><?= $value->nama_nasabah ?></strong></p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php
        }
        ?>
        <?php
        foreach ($tampil as $key => $value) {
        ?>
            <div class="modal fade" id="edit<?= $value->id_bank ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Rekening <?= $value->no_rekening ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('bank/c_bank/edit/' . $value->id_bank) ?>" method="POST">
                            <div class="modal-body">
                                <!-- form start -->
                                <div class="card-body">
                                    <form action="<?= base_url('bank/c_bank/edit' . $value->id_bank) ?>">
                                        <div class="form-group">
                                            <label>NO REKENING</label>
                                            <input type=" text" name="no_rekening" class="form-control" value="<?= $value->no_rekening ?>" placeholder="Masukkan No Rekening" required>
                                            <div class="invalid-feedback">Testing</div>
                                        </div>
                                        <div class="form-group">
                                            <label>NAMA NASABAH</label>
                                            <input type=" text" name="nama_nasabah" class="form-control" value="<?= $value->nama_nasabah ?>" placeholder="Masukkan Nama Nasabah" required>
                                            <div class="invalid-feedback">Testing</div>
                                        </div>
                                        <div class="form-group">
                                            <label>PIN</label>
                                            <input type=" text" name="pin" class="form-control" value="<?= $value->pin ?>" placeholder="Masukkan PIN" required>
                                            <div class="invalid-feedback">Testing</div>
                                        </div>
                                        <div class="form-group">
                                            <label>ATAS NAMA PELANGGAN</label>
                                            <select class="form-control" name="pelanggan">
                                                <option>---Pilih Atas Nama Pelanggan---</option>
                                                <?php
                                                foreach ($pelanggan as $key => $value) {
                                                ?>
                                                    <option value="<?= $value->id_pelanggan ?>"><?= $value->nama_pelanggan ?> | <?= $value->email ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                            <div class="invalid-feedback">Testing</div>
                                        </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" name="submit" class="btn btn-primary">EDIT</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php
        }
        ?>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->