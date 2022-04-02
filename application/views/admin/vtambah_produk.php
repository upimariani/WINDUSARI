<div class="modal fade" id="produk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-box"></i> Tambah Data Produk</h4>

                <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <?php
                $id_kategori = strtoupper(random_string('alnum', 5));
                $id = 'WS' . strtoupper(random_string('alnum', 5));
                echo form_open_multipart('Admin/c_produk/insert')
                ?>
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="id_kategori" value="<?= $id_kategori ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produk<span class="text-danger">*</span></label>
                        <input type="text" name="nama_produk" value="<?= set_value('nama_produk') ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Produk" required>
                        <div class="invalid-feedback">Testing</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Produk 250 gram<span class="text-danger">*</span></label>
                        <input type="number" name="harga" value="<?= set_value('harga') ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga Produk 250 gram" required>
                        <div class="invalid-feedback">Testing</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi<span class="text-danger">*</span></label>
                        <div class="form-group">
                            <textarea name="deskripsi" id="" class="form-control compose-textarea" style="height: 300px">
                    </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Qty Produk 250 gram<span class="text-danger">*</span></label>
                        <input type="number" name="qty" value="<?= set_value('qty') ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Qty Produk 250 gram" required>
                        <div class="invalid-feedback">Testing</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Gambar Produk<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="gambar" type="file" placeholder="Masukkan Gambar Produk" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-block btn-outline-success">SIMPAN</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal edit -->
<?php foreach ($produk as $row) {
?>
    <div class="modal fade" id="edit<?= $row->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Produk</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <?php
                    echo form_open_multipart('Admin/c_produk/edit/' . $row->id)
                    ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" value="<?= $row->nama_produk ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi</label>
                            <div class="form-group">
                                <textarea name="deskripsi" id="" class="form-control compose-textarea" style="height: 300px" required><?= $row->deskripsi ?>>
                    </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gambar Produk</label>
                            <img src="<?= base_url() ?>asset/gambar/<?= $row->gambar ?>" width='200px' />
                            <input type="file" name="gambar" class="form-control" id="exampleInputPassword1" value="<?= $row->gambar ?>">
                        </div>
                    </div>


                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->

<!-- modal delete -->
<?php foreach ($produk as $row) {
?>
    <div class="modal fade" id="delete<?= $row->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Produk</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form action="<?= base_url('Admin/c_produk/delete/' . $row->id) ?>" method="post">
                        <p>Apakah Anda Yakin Menghapus Data Produk <?= $row->nama_produk ?></p>
                        <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete Data</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->