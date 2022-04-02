<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Data User</h1>
                    Jumlah Akun User : <span class="badge bg-success"> <?= $jml_user ?> Akun</span>
                    <hr>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '  <div class="callout callout-success">';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    if ($this->session->flashdata('delete')) {
                        echo ' <div class="callout callout-info">';
                        echo $this->session->flashdata('delete');
                        echo '</div>';
                    }
                    ?>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-plus"> Tambah User</i>
                    </button>
                    <a href="<?= base_url('admin/c_laporan/user') ?>"><button type="button" class="btn btn-default">
                            <i class="fas fa-file-download"> Laporan User</i>
                        </button>
                    </a>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="example1 table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama User</th>
                                        <th class="text-center">Username / Password</th>
                                        <th class="text-center">Level User</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><strong><?= $value->nama_user ?></strong></td>
                                            <td class="text-center"><span class="badge bg-dark"><?= $value->username ?></span> / <span class="badge bg-purple"><?= $value->password ?></span></td>

                                            <td class="text-center"><?php if ($value->level_user == '1') {
                                                                        echo '<span class="badge bg-warning">Admin</span>';
                                                                    } else if ($value->level_user == '2') {
                                                                        echo '<span class="badge bg-info">JNE</span>';
                                                                    } else if ($value->level_user == '3') {
                                                                        echo '<span class="badge bg-success">TIKI</span>';
                                                                    } else if ($value->level_user == '4') {
                                                                        echo '<span class="badge bg-danger">POS INDONESIA</span>';
                                                                    } else if ($value->level_user == '5') {
                                                                        echo '<span class="badge bg-purple">BANK</span>';
                                                                    } ?>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit<?= $value->id_user ?>"><i class="far fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#delete<?= $value->id_user ?>"><i class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>