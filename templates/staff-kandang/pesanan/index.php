<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Menu Persediaan DOC</h1>
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
                        <th>Kode Pesanan</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        <th>Deskripsi Barang</th>
                        <th>Kuantitas Jual</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah Bayar</th>
                        <th>Pembayaran</th>
                        <th>Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($pesanan)): ?>
                    <tr>
                        <td colspan="4"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    $conn = get_connection();
                    $db   = new src\Database($conn);
                    foreach($pesanan as $key => $value): 
                       
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$value->kode_pesanan?></td>
                        <td><?=$value->tanggal?></td>
                        <td><?=$value->supplier?></td>
                        <td><?=$value->deskripsi?></td>
                        <td><?=$value->kuantitas_jual?></td>
                        <td><?=$value->harga_satuan?></td>
                        <td><?=$value->jumlah_bayar?></td>
                        <td><?=$value->pembayaran?></td>
                        <td><?=$value->tgl_byr?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>