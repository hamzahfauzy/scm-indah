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
    <a href="index.php?r=admin/kandang" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='kandang'?'active':''?>">
        <i class="nav-icon fas fa-building"></i>
        <p>
            Data Kandang
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="index.php?r=admin/pesanan" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='pesanan'?'active':''?>">
        <i class="nav-icon fas fa-bullhorn"></i>
        <p>
            Data Pesanan
        </p>
    </a>
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
        <i class="nav-icon fas fa-shopping-basket"></i>
        <p>
            Data Penjualan
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="javascript:void(0)" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && in_array($GLOBALS['__NAV_ACTIVE'],['laporan'])?'active':''?>">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>
            Rekapitulasi
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="index.php?r=admin/laporan/doc" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan DOC</p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="index.php?r=admin/laporan/penjualan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Penjualan</p>
            </a>
        </li> -->
    </ul>
</li>