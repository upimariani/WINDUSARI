<body class="js">
    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li><i class="ti-bookmark"></i> P-IRT <strong>No. 2063208010034-25</strong></li>
                                <li><i class="ti-heart"></i> Keamanan Pangan <strong>No. 034/3208/20</strong></li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-8 col-md-12 col-12">
                        <!-- Top Right -->
                        <div class="right-content">
                            <ul class="list-main">
                                <li><i class="ti-location-pin"></i> Kuningan Jawa Barat</li>
                                <li><i class="ti-user"></i> <a href="<?= base_url('c_katalog/profil') ?>">My account</a></li>
                                <?php
                                if ($this->session->userdata('username')) { ?>
                                    <li><i class="ti-power-off"></i><a href="<?= base_url() ?>c_login/logout">LogOut</a></li>
                                <?php
                                } else { ?>
                                    <li><i class="ti-power-off"></i><a href="<?= base_url() ?>c_login">Login</a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- End Top Right -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="<?= base_url('asset/login/images/logo.png') ?>" alt="logo"></a>
                        </div>
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <form action="<?= base_url('c_katalog/shopgrid') ?>" method="post">
                                    <input name="search" placeholder="Search Products Here....." type="text" autofocus value="<?= set_value('search') ?>">
                                    <button type="submit" class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="right-bar">
                            <!-- Search Form -->
                            <div class="sinlge-bar">
                                <a href="<?= base_url('c_katalog/profil') ?>" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                            </div>
                            <?php
                            if ($this->session->userdata('username')) {
                                $keranjang = $this->cart->contents();
                                $jml_item = 0;
                                foreach ($keranjang as $value) {
                                    $jml_item = $jml_item + $value['qty'];
                            ?>
                                <?php
                                }
                                ?>
                                <?php
                                if ($jml_item == 0) {
                                ?>
                                    <div class="sinlge-bar shopping">
                                        <a href="#" class="single-icon"><i class="ti-bag"></i></a>
                                        <!-- Shopping Item -->


                                        <div class="shopping-item">
                                            <div class="dropdown-cart-header">
                                            </div>
                                            <ul class="shopping-list">
                                                <img style="width: 200px; display: block; margin-left: auto; margin-right: auto;" src="<?= base_url('asset/foto/cart.png') ?>">

                                            </ul>
                                            <div class="bottom">
                                            </div>
                                        </div>

                                    <?php
                                } else {
                                    ?>
                                        <div class="sinlge-bar shopping">
                                            <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?= $jml_item ?></span></a>
                                            <!-- Shopping Item -->
                                            <div class="shopping-item">
                                                <div class="dropdown-cart-header">
                                                    <span><?= $jml_item ?> Items</span>
                                                    <a href="<?= base_url('c_belanja') ?>">View Cart</a>
                                                </div>
                                                <ul class="shopping-list">
                                                    <?php
                                                    foreach ($keranjang as $key => $value) {
                                                    ?>
                                                        <li>
                                                            <a href="<?= base_url('c_belanja/delete/' . $value['rowid']) ?>" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                            <a class="cart-img" href="#"><img src="<?= base_url('asset/gambar/' . $value['picture']) ?>" alt="#"></a>
                                                            <h4><a href="#"><?= $value['name'] ?></a></h4>
                                                            <p class="quantity"><?= $value['qty'] ?> <span class="amount"> Rp.<?= number_format($value['price'], 0) ?>| <?= $value['netto'] ?> gram</span><br>
                                                                Rp. <?= $this->cart->format_number($value['subtotal']); ?></p>

                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                                <div class="bottom">
                                                    <div class="total">
                                                        <span>Total</span>
                                                        <span class="total-amount">Rp. <?php echo $this->cart->format_number($this->cart->total(), 0); ?></span>
                                                    </div>
                                                    <a href="<?= base_url('c_belanja/cekout') ?>" class="btn animate">Checkout</a>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                        ?>
                                        <!--/ End Shopping Item -->
                                        </div>
                                    <?php
                                } else {
                                    ?>
                                        <div class="sinlge-bar shopping">
                                            <a href="#" class="single-icon"><i class="ti-bag"></i></a>
                                            <!-- Shopping Item -->
                                            <div class="shopping-item">
                                                <div class="dropdown-cart-header">
                                                </div>
                                                <div class="bottom">
                                                    <div class="total-center">
                                                        <span>Anda Belum Melakukan Login</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ End Shopping Item -->
                                        </div>
                                    <?php
                                }
                                    ?>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Inner -->
            <div class="header-inner">
                <div class="container">
                    <div class="cat-nav-head">
                        <div class="row">

                            <div class="col-lg-9 col-12">
                                <div class="menu-area">
                                    <!-- Main Menu -->
                                    <nav class="navbar navbar-expand-lg">
                                        <div class="navbar-collapse">
                                            <div class="nav-inner">
                                                <ul class="nav main-menu menu navbar-nav">
                                                    <li><a href="<?= base_url('c_katalog') ?>">Home</a></li>
                                                    <li <?php if ($this->uri->segment(1) == 'c_katalog' && $this->uri->segment(2) == 'shopgrid') {
                                                            echo 'class="active"';
                                                        }  ?>><a href="<?= base_url() ?>c_katalog/shopgrid">Shop Grid</a></li>
                                                    <li <?php if ($this->uri->segment(1) == 'c_pesanan_pelanggan') {
                                                            echo 'class="active"';
                                                        }  ?>><a href="<?= base_url('c_pesanan_pelanggan') ?>">Pesanan Saya</a></li>
                                                    <li><a href="<?= base_url('c_chatting') ?>">Chat</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                    <!--/ End Main Menu -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->