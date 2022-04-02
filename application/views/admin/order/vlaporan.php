<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Transaksi</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">Laporan Penjualan Harian</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                echo form_open('Admin/c_laporan/lap_harian') ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <select name="tanggal" class="form-control">
                                                <?php
                                                $mulai = 1;
                                                for ($i = $mulai; $i < $mulai + 31; $i++) {
                                                    $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                    echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <select name="bulan" class="form-control">
                                                <?php
                                                $mulai = 1;
                                                for ($i = $mulai; $i < $mulai + 12; $i++) {
                                                    $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                    echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <select name="tahun" class="form-control">
                                                <?php
                                                $mulai = date('Y') - 1;
                                                for ($i = $mulai; $i < $mulai + 10; $i++) {
                                                    $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                    echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-light btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                echo form_close() ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">Laporan Penjualan Bulanan</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                echo form_open('Admin/c_laporan/lap_bulanan') ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <select name="bulan" class="form-control">
                                                <?php
                                                $mulai = 1;
                                                for ($i = $mulai; $i < $mulai + 12; $i++) {
                                                    $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                    echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <select name="tahun" class="form-control">
                                                <?php
                                                $mulai = date('Y') - 1;
                                                for ($i = $mulai; $i < $mulai + 10; $i++) {
                                                    $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                    echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-light btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                echo form_close() ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">Laporan Penjualan Tahunan</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                echo form_open('Admin/c_laporan/lap_tahunan') ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <select name="tahun" class="form-control">
                                                <?php
                                                $mulai = date('Y') - 1;
                                                for ($i = $mulai; $i < $mulai + 10; $i++) {
                                                    $sel = $i == date('Y') ? 'selected="selected"' : '';
                                                    echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-light btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>