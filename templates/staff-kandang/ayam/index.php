<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Persediaan Ayam</h1>
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
                        <th>Jumlah</th>
                        <th>Riwayat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($ayam)): ?>
                    <tr>
                        <td colspan="4"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    $conn = get_connection();
                    $db   = new src\Database($conn);
                    foreach($ayam as $key => $value): 
                        $kandang = $db->single('tb_kandang',['id'=>$value->kandang_id]);
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$kandang->nomor_kandang?></td>
                        <td><?=$value->jumlah?></td>
                        <td>
                            <a href="index.php?r=staff-kandang/ayam/riwayat&id=<?=$value->id?>" class="btn btn-sm btn-warning">Riwayat</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>