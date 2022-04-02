<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data User</h4>

                <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form action="<?= base_url('Admin/c_user/insert') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama User*</label>
                            <input type="text" name="nama_user" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama User" required>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Username*</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Username" required>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password*</label>
                                    <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" required>
                                </div>
                            </div>
                        </div>

                        <div class=" form-group">
                            <label for="exampleInputPassword1">Level User*</label>
                            <select class="form-control" name="level_user" required>
                                <option>---Pilih Level User---</option>
                                <option value="1">Admin</option>
                                <option value="2">JNE</option>
                                <option value="3">TIKI</option>
                                <option value="4">POS INDONESIA</option>
                                <option value="5">BANK</option>

                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-block btn-outline-success">OK</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal edit -->
<?php foreach ($user as $row) {
?>
    <div class="modal fade" id="edit<?= $row->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data User</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form action="<?= base_url('Admin/c_user/edit/' . $row->id_user) ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama User</label>
                                <input type="text" name="nama_user" class="form-control" id="exampleInputEmail1" value="<?= $row->nama_user ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputPassword1" value="<?= $row->username ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="text" name="password" class="form-control" id="exampleInputPassword1" value="<?= $row->password ?>" required>
                            </div>
                            <div class=" form-group">
                                <label for="exampleInputPassword1">Level User</label>
                                <select class="form-control" name="level_user">
                                    <option value="1" <?php if ($row->level_user == 1) {
                                                            echo 'selected';
                                                        } ?>>Admin</option>
                                    <option value="2" <?php if ($row->level_user == 2) {
                                                            echo 'selected';
                                                        } ?>>JNE</option>
                                    <option value="3" <?php if ($row->level_user == 3) {
                                                            echo 'selected';
                                                        } ?>>TIKI</option>
                                    <option value="4" <?php if ($row->level_user == 4) {
                                                            echo 'selected';
                                                        } ?>>POS INDONESIA</option>
                                    <option value="5" <?php if ($row->level_user == 5) {
                                                            echo 'selected';
                                                        } ?>>BANK</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->

<!-- modal delete -->
<?php foreach ($user as $row) {
?>
    <div class="modal fade" id="delete<?= $row->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data User</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form action="<?= base_url('Admin/c_user/delete/' . $row->id_user) ?>" method="post">
                        <p>Apakah Anda Yakin Menghapus Data User <strong><?= $row->nama_user ?></strong></p>
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