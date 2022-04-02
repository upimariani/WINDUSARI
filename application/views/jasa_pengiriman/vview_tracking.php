<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jasa Pengiriman <?= $this->session->userdata('nama_user'); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Profile Image -->
                    <div class="card_laporan_tracking card card-primary card-outline" style="display:none">
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">LAPORAN TRACKING</h3>
                            <ul id="list_laporan_tracking" class="list_laporan_tracking list-group list-group-unbordered mb-3">

                            </ul>
                            <button type="button" id="hide_card" class="btn btn-primary"><i class="fas fa-caret-left"></i> | Kembali</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>