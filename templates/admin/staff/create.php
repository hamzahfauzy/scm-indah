<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Data <?= get_role($role)?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=admin/staff&role=<?=$role?>" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <form action="" method="post" class="col-12 col-md-6">
            <input type="hidden" name="role" value="<?=$role?>">
            <div class="mb-3">
                <label for="">Kode Karyawan</label>
                <input type="text" class="form-control" name="kode_karyawan" required>
            </div>
            <div class="mb-3">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="">Alamat</label>
                <textarea name="alamat" class="form-control" cols="30" rows="10" required></textarea>
            </div>
            <div class="mb-3">
                <label for="">Tanggal Masuk Kerja</label>
                <input type="date" class="form-control" name="tanggal_masuk_kerja" required>
            </div>
            <div class="mb-3">
                <label for="">No HP</label>
                <input type="number" class="form-control" name="no_hp" required>
            </div>
            <div class="mb-3">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
        <p></p>
    </div>
</div>