<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Data Persediaan Ayam</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=staff-kandang/ayam" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <form action="" method="post" class="col-12 col-md-6">
            <div class="mb-3">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" name="ayam[tanggal]" value="<?=$ayam->tanggal?>" required>
            </div>
            <div class="mb-3">
                <label for="">Nomor Kandang</label>
                <input type="text" class="form-control" name="ayam[no_kandang]" value="<?=$ayam->no_kandang?>" required>
            </div>
            <div class="mb-3">
                <label for="">Jumlah Ayam</label>
                <input type="number" class="form-control" name="ayam[jumlah_ayam]" value="<?=$ayam->jumlah_ayam?>" required>
            </div>
            <div class="mb-3">
                <label for="">Mati</label>
                <input type="number" class="form-control" name="ayam[mati]" value="<?=$ayam->mati?>" required>
            </div>
            <div class="mb-3">
                <label for="">Jual</label>
                <input type="number" class="form-control" name="ayam[sakit]" value="<?=$ayam->sakit?>" required>
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
        <p></p>
    </div>
</div>