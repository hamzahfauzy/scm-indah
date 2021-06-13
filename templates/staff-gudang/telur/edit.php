<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Data Persediaan Telur</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=staff-gudang/telur" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <form action="" method="post" class="col-12 col-md-6">
            <div class="mb-3">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" name="telur[tanggal]" value="<?=$telur->tanggal?>" required>
            </div>
            <div class="mb-3">
                <label for="">Jenis Telur</label>
                <select name="telur[jenis_telur]" id="" class="form-control" required>
                    <option value="">- Pilih -</option>
                    <?php foreach(['A+', 'A', 'B', 'C', 'D', 'E'] as $val): ?>
                    <option value="<?=$val?>" <?=$val==$telur->jenis_telur?'selected':''?>><?=$val?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Jumlah</label>
                <input type="number" class="form-control" name="telur[jumlah]" value="<?=$telur->jumlah?>" required>
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
        <p></p>
    </div>
</div>