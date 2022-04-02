<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Data Diskon</h1>
                    <?php
                    $hariini = date("d/m/Y");
                    echo "Tanggal Format dd/mm/yyyy = " . $hariini . "<br>";
                    ?>
                    <hr>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="callout callout-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><i class="icon fas fa-check"></i> ';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    if ($this->session->flashdata('delete')) {
                        echo '  <div class="callout callout-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><i class="icon fas fa-check"></i> ';
                        echo $this->session->flashdata('delete');
                        echo '</div>';
                    }
                    ?>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-plus"> Tambah Diskon</i>
                    </button>
                    <a href="<?= base_url('admin/c_laporan/diskon') ?>"><button type="button" class="btn btn-default">
                            <i class="fas fa-file-download"> Laporan Diskon</i>
                        </button></a>

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
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Berat Produk</th>
                                        <th class="text-center">Nama Diskon</th>
                                        <th class="text-center">Besar Diskon</th>
                                        <th class="text-center">Level Member</th>
                                        <th class="text-center">s/d Tanggal</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($tampil_diskon as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $value->nama_produk ?> <span class="badge badge-primary"> <?= $value->id_kategori ?></span></td>
                                            <td><?= $value->berat_produk ?> gram</td>
                                            <td><?= $value->nama_diskon ?></td>
                                            <td>Harga Awal : Rp. <?= number_format($value->harga_produk, 0) ?> <br> Diskon <span class="badge badge-danger"><?= $value->besar_diskon ?> % </span><br>
                                                Harga Diskon : <span class="badge badge-success">Rp. <?= number_format($value->harga_produk - ($value->besar_diskon / 100 * $value->harga_produk), 0); ?></span>
                                            </td>
                                            <td class="text-center"><?php if ($value->level_member == '1') {
                                                                        echo '<span class="badge badge-warning">Gold</span>';
                                                                    }
                                                                    if ($value->level_member == '2') {
                                                                        echo '<span class="badge badge-secondary">Silver</span>';
                                                                    }
                                                                    if ($value->level_member == '3') {
                                                                        echo '<span class="badge badge-info">Classic</span>';
                                                                    } ?></td>
                                            <td class="text-center"><?= $value->tgl_selesai ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit<?= $value->id_diskon ?>"><i class="far fa-edit"></i></button>
                                                <a class="btn btn-default" href="<?= base_url('Admin/c_diskon/delete/' . $value->id_diskon) ?>"><i class="far fa-trash-alt"></i></a>
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

    <!-- Tambah Data Diskon -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Diskon</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form action="<?= base_url('Admin/c_diskon/insert_diskon') ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Produk</label>
                                <select class="form-control" name="id_kategori" required>
                                    <option>---Pilih Produk---</option>
                                    <?php
                                    foreach ($produk as $key => $value) {
                                    ?>

                                        <option value="<?= $value->id_kategori ?>"><strong><?= $value->nama_produk ?></strong> | <?= $value->berat_produk ?> gram</option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Diskon</label>
                                <input type="text" name="nama_diskon" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nama Diskon" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Besar Diskon</label>
                                <input type="number" name="besar_diskon" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Besar Diskon" required>
                            </div>
                            <div class=" form-group">
                                <label for="exampleInputPassword1">Level Member</label>
                                <select class="form-control" name="level_member" required>
                                    <option>---Pilih Level Member---</option>
                                    <option value="3">Classic</option>
                                    <option value="2">Silver</option>
                                    <option value="1">Gold</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date:</label>
                                <input type="text" name="tgl" class="datepicker form-control" required />

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
    <!-- /.modal -->

    <!-- Edit Data Diskon -->
    <!-- modal edit -->
    <?php foreach ($tampil_diskon as $row) {
    ?>
        <div class="modal fade" id="edit<?= $row->id_diskon ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Diskon</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form action="<?= base_url('Admin/c_diskon/update/' . $row->id_diskon) ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Produk</label>
                                    <select class="form-control" name="id_kategori" required>
                                        <option>---Pilih Produk---</option>
                                        <?php
                                        foreach ($produk as $key => $value) {
                                        ?>

                                            <option value="<?= $value->id_kategori ?>" <?php if ($row->id_kategori == $value->id_kategori) {
                                                                                            echo "selected";
                                                                                        } ?>><strong><?= $value->nama_produk ?></strong> | <?= $value->berat_produk ?> gram</option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Diskon</label>
                                    <input type="text" name="nama_diskon" value="<?= $row->nama_diskon ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nama Diskon" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Besar Diskon</label>
                                    <input type="number" name="besar_diskon" value="<?= $row->besar_diskon ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Besar Diskon" required>
                                </div>
                                <div class=" form-group">
                                    <label for="exampleInputPassword1">Level Member</label>
                                    <select class="form-control" name="level_member" required>
                                        <option>---Pilih Level Member---</option>
                                        <option value="3" <?php if ($row->level_member == '3') {
                                                                echo "selected";
                                                            } ?>>Classic</option>
                                        <option value="2" <?php if ($row->level_member == '2') {
                                                                echo "selected";
                                                            } ?>>Silver</option>
                                        <option value="1" <?php if ($row->level_member == '1') {
                                                                echo "selected";
                                                            } ?>>Gold</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date:</label>
                                    <input type="text" name="tgl" class="datepicker form-control" value="<?= $row->tgl_selesai ?>" required />

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
        <!-- /.modal -->
    <?php } ?>
    <!-- /.modal -->