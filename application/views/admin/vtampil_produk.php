<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Data Produk</h1>
                    <hr>
                    <table class="table table-active">
                        <tr>
                            <td>
                                <h6><strong>Jumlah Produk </strong>
                            </td>
                            <td> : <span class="badge bg-warning"> <?= $jml_produk ?></span> produk</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6><strong>Kategori</strong>
                            </td>
                            <td>: 250 gram, 500 gram, 2500 gram dan 3000 gram</h6>
                            </td>
                        </tr>
                    </table>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '  <div class="callout callout-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><i class="icon fas fa-check"></i> ';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    if ($this->session->flashdata('delete')) {
                        echo '  <div class="callout callout-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><i class="icon fas fa-check"></i>';
                        echo $this->session->flashdata('delete');
                        echo '</div>';
                    }
                    //notifikasi gagal upload
                    if (isset($error)) {
                        echo '  <div class="callout callout-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><i class="icon fas fa-check"></i> ';
                        echo $error;
                        echo '</div>';
                    }

                    ?>
                    <hr>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#produk">
                        <i class="fas fa-plus"> Tambah Produk</i>
                    </button>
                    <a href="<?= base_url('admin/c_laporan/produk') ?>"><button type="button" class="btn btn-default">
                            <i class="fas fa-file"> Laporan</i>
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
                            <table class="example1 table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk as $row) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><strong><?= $no++ ?>.</strong></td>
                                            <td class="text-center"><img style="width: 100px;" src="<?= base_url('asset/gambar/' . $row->gambar) ?>"></td>
                                            <td class="text-center">
                                                <h5><?= $row->nama_produk ?></h5>

                                            </td>
                                            <td><?= $row->deskripsi ?></td>
                                            <td class="text-center">

                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#delete<?= $row->id ?>"><i class="far fa-trash-alt"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit<?= $row->id ?>"><i class="fas fa-edit"></i></button>
                                                <a href="<?= base_url('admin/c_produk/select_kategori/' . $row->id) ?>" type="button" class="btn btn-default"><i class="fas fa-bars"></i></a>
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