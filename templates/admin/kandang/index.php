<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Kandang</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=admin/kandang/create" class="btn btn-sm btn-primary">+ Tambah</a>
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
                        <th>Nomor Kandang</th>
                        <th>Kuota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($rows)): ?>
                    <tr>
                        <td colspan="4"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    $conn = get_connection();
                    $db   = new src\Database($conn);
                    foreach($rows as $key => $value): 
                        $db->query = "SELECT SUM(jumlah) as jumlah_ayam FROM tb_persediaan_ayam WHERE kandang_id=$value->id";
                        $persediaan = $db->exec('single');
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$value->nomor_kandang?></td>
                        <td>
                        <?=$value->kuota?>
                        <?php if($persediaan->jumlah_ayam): ?>
                        <br>
                        Jumlah Ayam : <?=$persediaan->jumlah_ayam?>
                        <?php endif ?>
                        </td>
                        <td>
                            <a href="index.php?r=staff-kandang/kandang/riwayat&id=<?=$value->id?>" class="btn btn-sm btn-default">Riwayat</a>
                            <a href="index.php?r=admin/kandang/edit&id=<?=$value->id?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="index.php?r=admin/kandang/delete&id=<?=$value->id?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>