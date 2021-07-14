<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Riwayat Persediaan Ayam</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=staff-kandang/ayam" class="btn btn-sm btn-warning">Kembali</a>
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
                        <th>Tanggal</th>
                        <th>Nomor Kandang</th>
                        <th>Oleh</th>
                        <th>Jumlah Ayam</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($ayam)): ?>
                    <tr>
                        <td colspan="6"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    $conn = get_connection();
                    $db   = new src\Database($conn);
                    foreach($ayam as $key => $value): 
                        $kandang = $db->single('tb_kandang',['id'=>$value->kandang_id]);
                        $pengguna = $db->single('tb_pengguna',['id'=>$value->pengguna_id]);
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$value->tanggal?></td>
                        <td><?=$kandang->nomor_kandang?></td>
                        <td><?=$pengguna->username?></td>
                        <td><?=$value->jumlah_ayam-$value->mati?></td>
                        <td><?=$value->keterangan?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>