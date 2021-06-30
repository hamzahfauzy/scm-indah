<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Data Kandang</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=admin/kandang" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <form action="" method="post" class="col-12 col-md-6">
            <div class="mb-3">
                <label for="">Nomor Kandang</label>
                <input type="text" value="<?=$row->nomor_kandang?>" class="form-control" name="nomor_kandang" required>
            </div>
            <div class="mb-3">
                <label for="">Kuota</label>
                <input type="number" min="1" value="<?=$row->kuota?>" class="form-control" name="kuota" required>
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
        <p></p>
    </div>
</div>