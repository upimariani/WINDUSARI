<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin WINDU SARI</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview
                <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_dasboard') {
                    echo 'menu-open';
                }  ?>">
                    <a href="<?= base_url('Admin/c_dasboard') ?>" class="nav-link
                    <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_dasboard') {
                        echo 'active';
                    }  ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview 
                <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_produk') {
                    echo 'menu-open';
                }  ?>">
                    <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_produk') {
                                                    echo 'active';
                                                }  ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/c_produk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_produk') {
                                                                                            echo 'active';
                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/c_user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_user') {
                                                                                            echo 'active';
                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/c_diskon') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_diskon') {
                                                                                            echo 'active';
                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Diskon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/c_setting_lokasi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_setting_lokasi') {
                                                                                                    echo 'active';
                                                                                                }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Setting</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_order' && $this->uri->segment(3) == 'selesai') {
                                                        echo 'menu-open';
                                                    }  ?>">
                    <a href="<?= base_url('Admin/c_order/selesai') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_order' && $this->uri->segment(3) == 'selesai') {
                                                                                            echo 'active';
                                                                                        }  ?>">
                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                        <p>
                            Order
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('Admin/c_login_user/logout_user') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            LogOut
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>