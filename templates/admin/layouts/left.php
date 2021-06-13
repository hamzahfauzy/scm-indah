<aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link navbar-cyan">
        <img src="<?=base_url()?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CV. Abadi Bersama</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=base_url()?>/images/logo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('user')->username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php?r=<?=session()->get('user')->role?>" class="nav-link <?= !isset($GLOBALS['__NAV_ACTIVE']) || (isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='home')?'active':''?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <?php if(session()->get('user')->role == 'admin'): ?>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='staff'?'active':''?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Staff
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?r=admin/staff/index&role=staff-kandang" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Staff Kandang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?r=admin/staff/index&role=staff-gudang" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Staff Gudang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?r=admin/staff/index&role=staff-kasir" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Staff Kasir</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && in_array($GLOBALS['__NAV_ACTIVE'],['telur','ayam'])?'active':''?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Data Persediaan
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?r=staff-kandang/ayam" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Persediaan Ayam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?r=staff-gudang/telur" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Persediaan Telur</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="index.php?r=staff-kasir/penjualan" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='penjualan'?'active':''?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Data Rekapitulasi
                        </p>
                    </a>
                </li>
                <?php endif ?>

                <?php if(session()->get('user')->role == 'staff-kandang'): ?>
                <li class="nav-item">
                    <a href="index.php?r=staff-kandang/supplier" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='suplier'?'active':''?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            DOC Suplier
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?r=staff-kandang/ayam" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='ayam'?'active':''?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Persediaan Ayam
                        </p>
                    </a>
                </li>
                <?php endif ?>

                <?php if(session()->get('user')->role == 'staff-gudang'): ?>
                <li class="nav-item">
                    <a href="index.php?r=staff-gudang/telur" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='telur'?'active':''?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Persediaan Telur
                        </p>
                    </a>
                </li>
                <?php endif ?>

                <?php if(session()->get('user')->role == 'staff-kasir'): ?>
                <li class="nav-item">
                    <a href="index.php?r=staff-kasir/penjualan" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='penjualan'?'active':''?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Data Penjualan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='rekapitulasi'?'active':''?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Data Rekapitulasi
                        </p>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        
    </div>
    <!-- /.sidebar -->
</aside>