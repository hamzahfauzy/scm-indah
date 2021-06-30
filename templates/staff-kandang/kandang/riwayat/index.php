<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Riwayat Kandang <?=$kandang->nomor_kandang?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=staff-kandang/kandang/riwayat/create&id=<?=$kandang->id?>" class="btn btn-sm btn-success">+ Tambah Data</a>
                    <a href="index.php?r=staff-kandang/kandang" class="btn btn-sm btn-warning">Kembali</a>
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
                        <th>Oleh</th>
                        <th>Jumlah Ayam</th>
                        <th>Produksi</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($riwayat)): ?>
                    <tr>
                        <td colspan="6"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    $conn = get_connection();
                    $db   = new src\Database($conn);
                    foreach($riwayat as $key => $value): 
                        $kandang = $db->single('tb_kandang',['id'=>$value->kandang_id]);
                        $pengguna = $db->single('tb_pengguna',['id'=>$value->pengguna_id]);
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$value->tanggal?></td>
                        <td><?=$pengguna->username?></td>
                        <td>
                        <?=$value->jumlah_ayam?><br>
                        Sakit : <?=$value->sakit??0?>, Mati : <?=$value->mati??0?>, Sisa : <?=$value->jumlah_ayam-$value->mati?>
                        </td>
                        <td>
                            Produk : <?=$value->produk??0?><br>
                            Ikat : <?=$value->ikat??0?><br>
                            Piring : <?=$value->piring??0?><br>
                            Butir : <?=$value->butir??0?><br>
                            Pecah : <?=$value->pecah??0?><br>
                        </td>
                        <td><?=$value->keterangan?></td>
                        <td>
                            <?php if(session()->get('user')->id == $value->pengguna_id && $value->keterangan != 'DOC Masuk' && $key == 1): ?>
                            <a href="index.php?r=staff-kandang/kandang/riwayat/delete&id=<?=$value->id?>" class="btn btn-sm btn-danger">Hapus</a>
                            <?php else: ?>
                            -
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>