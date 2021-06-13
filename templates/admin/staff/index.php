<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data <?= get_role($role) ?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=admin/staff/create&role=<?=$role?>" class="btn btn-sm btn-primary">+ Tambah</a>
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
                        <th>Kode Karyawan</th>
                        <th>Nama</th>
                        <th>Tanggal Masuk</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($staff)): ?>
                    <tr>
                        <td colspan="6"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    $conn = get_connection();
                    $db   = new src\Database($conn);
                    foreach($staff as $key => $value): 
                        $_staff = $db->single('tb_staff',['pengguna_id'=>$value->id]);
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$_staff->kode_karyawan?></td>
                        <td><?=$_staff->nama?></td>
                        <td><?=$_staff->tanggal_masuk_kerja?></td>
                        <td><?=$_staff->no_hp?></td>
                        <td>
                            <a href="index.php?r=admin/staff/edit&id=<?=$value->id?>&role=<?=$role?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="index.php?r=admin/staff/delete&id=<?=$value->id?>&role=<?=$role?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>