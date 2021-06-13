<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Penjualan</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=staff-kasir/penjualan/create" class="btn btn-sm btn-primary">+ Tambah</a>
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
                        <th>Kasir</th>
                        <th>Kosumen</th>
                        <th>Telur</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($penjualan)): ?>
                    <tr>
                        <td colspan="7"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    $conn = get_connection();
                    $db   = new src\Database($conn);
                    foreach($penjualan as $key => $value): 
                        $pengguna = $db->single('tb_pengguna',['id'=>$value->pengguna_id]);
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td>
                        <?=$pengguna->username?>
                        <br><?=$value->tanggal?>
                        </td>
                        <td><?=$value->nama_konsumen?></td>
                        <td>
                        <?=$value->jenis_telur?>
                        <br>
                        <?=$value->jumlah_telur?> x <?=$value->harga_satuan?>
                        </td>
                        <td>
                        Rp. <?=number_format($value->jumlah_telur*$value->harga_satuan)?>
                        </td>
                        <td>
                            <!-- <a href="index.php?r=staff-kasir/penjualan/edit&id=<?=$value->id?>" class="btn btn-sm btn-warning">Edit</a> -->
                            <a href="index.php?r=staff-kasir/penjualan/delete&id=<?=$value->id?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>