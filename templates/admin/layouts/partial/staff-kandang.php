<li class="nav-item">
    <a href="index.php?r=admin/kandang" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='kandang'?'active':''?>">
        <i class="nav-icon fas fa-building"></i>
        <p>
            Data Kandang
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="index.php?r=staff-kandang/kandang/doc" class="nav-link <?= isset($GLOBALS['__NAV_ACTIVE']) && $GLOBALS['__NAV_ACTIVE']=='doc'?'active':''?>">
        <i class="nav-icon fas fa-list-alt"></i>
        <p>
            DOC
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