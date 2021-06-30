<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Pesanan</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=admin/pesanan/create" class="btn btn-sm btn-primary">Buat Pesanan</a>
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
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($rows)): ?>
                    <tr>
                        <td colspan="5"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    foreach($rows as $key => $value): 
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$value->tanggal?></td>
                        <td><?=$value->jumlah?></td>
                        <td>
                        <?=$value->status?>
                        <?php if($value->status == 'Di Pesan'): ?>
                        <br>
                        <a href="index.php?r=admin/pesanan/sampai&id=<?=$value->id?>">Update Pesanan Sampai</a>
                        <?php endif ?>
                        </td>
                        <td>
                            <?php if($value->status == 'Di Pesan'): ?>
                            <a href="index.php?r=admin/pesanan/edit&id=<?=$value->id?>" class="btn btn-sm btn-warning">Edit</a>
                            <?php endif ?>
                            <a href="index.php?r=admin/pesanan/delete&id=<?=$value->id?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>