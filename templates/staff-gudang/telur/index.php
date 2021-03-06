<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Persediaan Telur</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=staff-gudang/telur/riwayat" class="btn btn-sm btn-primary">Riwayat</a>
                </div>
            </div>
        </div>

        <?php if($msg = session()->get_flash('success')): ?>
        <div class="alert alert-success" role="alert">
            <?=$msg?>
        </div>
        <?php endif ?>

        <?php if($msg = session()->get_flash('fail')): ?>
        <div class="alert alert-danger" role="alert">
            <?=$msg?>
        </div>
        <?php endif ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Telur</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($telur)): ?>
                    <tr>
                        <td colspan="3"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    $conn = get_connection();
                    $db   = new src\Database($conn);
                    foreach($telur as $key => $value):
                        $db->query = "SELECT SUM(jumlah_telur) as total FROM tb_penjualan WHERE jenis_telur='$value->jenis_telur'"; 
                        $penjualan = $db->exec('single');
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$value->jenis_telur?></td>
                        <td><?=$value->jumlah-$penjualan->total?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>