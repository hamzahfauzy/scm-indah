<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data DOC</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pesanan</th>
                        <th>Supplier</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($rows)): ?>
                    <tr>
                        <td colspan="6"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    foreach($rows as $key => $value): 
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td>
                        <?=$value->kode_pesanan?><br>
                        <p><?=nl2br($value->deskripsi)?></p>
                        </td>
                        <td><?=$value->supplier?></td>
                        <td><?=$value->tanggal?></td>
                        <td><?=$value->jumlah?></td>
                        <td>
                        Rp. <?=number_format($value->harga_satuan)?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>