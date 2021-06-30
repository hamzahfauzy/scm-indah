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

                <?php require 'partial/'.session()->get('user')->role.'.php' ?>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        
    </div>
    <!-- /.sidebar -->
</aside>