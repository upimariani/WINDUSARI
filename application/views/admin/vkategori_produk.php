<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Data Kategori Produk</h1>
                    <hr>
                    <?php
                    if ($this->session->userdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>';
                        echo $this->session->userdata('pesan');
                        echo '</div>';
                    }
                    ?>

                    <hr>
                    <table>
                        <tr>
                            <td><strong>Id Produk</strong></td>
                            <td>: <span class="badge bg-success"><?= $kategori['produk']->id ?></span></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Produk </strong></td>
                            <td>: <?= $kategori['produk']->nama_produk ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Kategori </strong></td>
                            <td>: <span class="badge bg-warning"><?= $jml_kategori ?></span> jenis berat</td>
                        </tr>
                    </table>

                    <br>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table table-hover">
                        <table class="table m-0">
                            <thead>
                                <tr class="table-default">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode Produk</th>
                                    <th class="text-center">Berat</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kategori['kategori'] as $key => $value) {
                                    $id = $value->id;
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $no++ ?></a></td>
                                        <td class="text-center"><span class="badge badge-warning"><?= $value->id_kategori ?></span></td>
                                        <td><?= $value->berat_produk ?> gram</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">Rp. <?= number_format($value->harga_produk, 0) ?></div>
                                        </td>
                                        <td class="text-center"><span class="badge badge-success"><?= $value->qty_produk ?></span></td>
                                        <td class="text-center"><button data-toggle="modal" data-target="#edit<?= $value->id_kategori ?>" class="btn btn-app bg-info">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button data-toggle="modal" data-target="#hapus<?= $value->id_kategori ?>" class="btn btn-app bg-danger">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url('admin/c_produk') ?>"><i class="fas fa-backward"></i> Kembali</a>
                            <a class="dropdown-item" href="<?= base_url('admin/c_laporan/kategori/' . $id) ?>"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                    <button data-toggle="modal" data-target="#modal-default" type="button" class="btn btn-default btn-sm btn float-right"> <i class="fas fa-plus"> Tambah Kategori</i></button>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

</div>
<!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->


<?php
foreach ($kategori['kategori'] as $key => $value) {
?>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $id_kategori = strtoupper(random_string('alnum', 5));
                    echo form_open_multipart('Admin/c_produk/insert_kategori') ?>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="id_kategori" value="<?= $id_kategori ?>">
                            <input type="hidden" name="id" value="<?= $value->id ?>">
                            <label for="exampleInputPassword1">Berat Produk</label>
                            <select name="berat" class="form-control">
                                <option>---Pilih Berat Produk---</option>
                                <option value="250">250 gram</option>
                                <option value="500">500 gram</option>
                                <option value="2500">2500 gram</option>
                                <option value="3000">3000 gram</option>
                            </select>
                            <div class="invalid-feedback">Testing</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Produk</label>
                            <input type="number" name="harga" value="<?= set_value('harga') ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Harga Produk" required>
                            <div class="invalid-feedback">Testing</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Produk</label>
                            <input type="number" name="jml" value="<?= set_value('jml') ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Jumlah Produk" required>
                            <div class="invalid-feedback">Testing</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-block btn-outline-info">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
            <?php
            echo form_close()
            ?>
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php
}
?>

<!-- edit kategori -->
<?php
foreach ($kategori['kategori'] as $key => $value) {
    echo form_open('admin/c_produk/edit_kategori/' . $value->id_kategori)
?>
    <div class="modal fade" id="edit<?= $value->id_kategori ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Kategori <?= $value->id_kategori ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?= $value->id ?>">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Berat Produk</label>
                            <select name="berat" class="form-control">
                                <option>---Pilih Berat Produk---</option>

                                <option value="250" <?php
                                                    if ($value->berat_produk == 250) {
                                                        echo 'selected';
                                                    }
                                                    ?>>250 gram</option>
                                <option value="500" <?php
                                                    if ($value->berat_produk == 500) {
                                                        echo 'selected';
                                                    }
                                                    ?>>500 gram</option>
                                <option value="2500" <?php
                                                        if ($value->berat_produk == 2500) {
                                                            echo 'selected';
                                                        }
                                                        ?>>2500 gram</option>
                                <option value="3000" <?php
                                                        if ($value->berat_produk == 3000) {
                                                            echo 'selected';
                                                        }
                                                        ?>>3000 gram</option>
                            </select>
                            <div class="invalid-feedback">Testing</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Produk</label>
                            <input type="text" name="harga" value="<?= $value->harga_produk ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Harga Produk" required>
                            <div class="invalid-feedback">Testing</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Produk</label>
                            <input type="text" name="jml" value="<?= $value->qty_produk ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Jumlah Produk" required>
                            <div class="invalid-feedback">Testing</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-block btn-outline-info">PERBAHARUI</button>
                </div>
            </div>
            <!-- /.modal-content -->
            <?php
            echo form_close()
            ?>
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php
}
?>
<!-- hapus kategori -->
<?php
foreach ($kategori['kategori'] as $key => $value) {
    echo form_open('admin/c_produk/hapus_kategori/' . $value->id_kategori)
?>
    <div class="modal fade" id="hapus<?= $value->id_kategori ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" name="id" value="<?= $value->id ?>">
                    <h4 class="modal-title">Hapus Data Kategori <?= $value->berat_produk ?> gram</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Menghapus Data <strong><?= $value->nama_produk ?></strong> <?= $value->berat_produk ?> gram ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-block btn-outline-danger">OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php
    echo form_close();
}
?>