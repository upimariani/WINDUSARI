<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jasa Pengiriman <?= $this->session->userdata('nama_user'); ?></h1>
                    <?php
                    if ($this->session->userdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>';
                        echo $this->session->userdata('pesan');
                        echo '</div>';
                    }
                    ?>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>


        </div><!-- /.container-fluid -->
        <div class="card_laporan_tracking card card-primary card-outline" style="display:none">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center">LAPORAN TRACKING</h3>
                <ul id="list_laporan_tracking" class="list_laporan_tracking list-group list-group-unbordered mb-3">

                </ul>
                <button type="button" id="hide_card" class="btn btn-primary"><i class="fas fa-caret-left"></i> | Kembali</button>
            </div>
            <!-- /.card-body -->
        </div>

    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <?php $hasil = 0;
                    foreach ($tampil as $key => $value) {
                        $hasil += $value->ongkir;
                    }
                    ?>
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">

                            <h3 class="profile-username text-center">Laporan Jasa Pengiriman</h3>

                            <p class="text-muted text-center">Kami Siap Mengantar Pesanan Anda</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">

                                    <b>Pengguna Jasa</b> <a class="float-right"><?= $jumlah ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Ongkir</b> <a class="float-right">Rp. <?= number_format($hasil, 0) ?></a>
                                </li>
                            </ul>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">

                                    <?php
                                    foreach ($tampil as $key => $value) {
                                    ?>
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <span class="username">
                                                    <h4><?= $value->nama_penerima ?></h4>
                                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">
                                                    <h3><?= $value->no_resi ?></h3>
                                                </span>
                                            </div>
                                            <!-- /.user-block -->
                                            <ul>
                                                <li>Estimasi : <?= $value->estimasi ?></li>
                                                <li>Paket : <?= $value->paket ?></li>
                                                <li>Berat : <?= $value->berat ?></li>
                                                <li>Ongkir : Rp. <?= number_format($value->ongkir, 0)  ?></li>
                                            </ul>
                                            <p>Alamat :
                                            <h5><?= $value->alamat ?> Kode Pos <?= $value->kode_pos ?><br> Kota <?= $value->kota ?> Prov <?= $value->provinsi ?> </h5>
                                            </p>
                                            <div class="timeline-footer">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $value->id_jasa_pengiriman ?>">UPDATE STATUS</button>
                                                <button type="button" class="btn btn-info btn-id_jasa_pengiriman" data-jasa="<?= $value->id_jasa_pengiriman ?>">TRACKING</button>
                                            </div>
                                        </div>
                                        <!-- /.post -->
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- /.modal -->
                                <!-- /.tab-pane -->
                                <div class=" tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">

                                        s
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->

                        </div><!-- /.card-body -->

                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <?php
    foreach ($tampil as $key => $value) {
    ?>


        <div class="modal fade" id="modal-default<?= $value->id_jasa_pengiriman ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Status Pengiriman</h4>
                        <hr><br>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>NO RESI <?= $value->no_resi ?></h5>
                        <form action="<?= base_url('jasa_pengiriman/c_jasa_pengiriman/update_status_pengiriman') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $value->id_jasa_pengiriman ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status Pengiriman</label>
                                    <select name="status_pengiriman" class="form-control">
                                        <option value="-">---Pilih Status Pengiriman---</option>
                                        <option value="SHIPMENT RECEIVED BY COUNTER OFFICER">SHIPMENT RECEIVED BY COUNTER OFFICER</option>
                                        <option value="RECEIVED AT ORIGIN GATEWAY">RECEIVED AT ORIGIN GATEWAY</option>
                                        <option value="DEPATED FROM TRANSIT">DEPATED FROM TRANSIT</option>
                                        <option value="SHIPMENT PICKED UP BY COURIER">SHIPMENT PICKED UP BY COURIER</option>
                                        <option value="RECEIVED AT SORTING CENTER">RECEIVED AT SORTING CENTER</option>
                                        <option value="RECEIVED AT INBOUND STATION">RECEIVED AT INBOUND STATION</option>
                                        <option value="WITH DELIVERY COURIER">WITH DELIVERY COURIER</option>
                                        <select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Keterangan" required>
                                    <div class="invalid-feedback">Testing</div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
    <!-- /.content -->
</div>