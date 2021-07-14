<li class="nav-item">
    <a href="index.php?r=admin/kandang" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='kandang'?'active':''?>">
        <i class="nav-icon fas fa-building"></i>
        <p>
            Data Kandang
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?r=staff-kandang/kandang" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='doc'?'active':''?>">
        <i class="nav-icon fas fa-list-alt"></i>
        <p>
            Persediaan Ayam
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?r=staff-kandang/pesanan" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='pesanan'?'active':''?>">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>
            DOC
        </p>
    </a>
</li>