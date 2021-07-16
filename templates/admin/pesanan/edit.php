<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Pesanan</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=admin/pesanan" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <form action="" method="post" class="col-12 col-md-6">
            <div class="mb-3">
                <label for="">Kode Pesanan</label>
                <input type="text" class="form-control" name="kode_pesanan" required value="<?=$row->kode_pesanan?>">
            </div>
            <div class="mb-3">
                <label for="">Supplier</label>
                <input type="text" class="form-control" name="supplier" required value="<?=$row->supplier?>">
            </div>
            <div class="mb-3">
                <label for="">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" required><?=$row->deskripsi?></textarea>
            </div>
            <div class="mb-3">
                <label for="">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" value="<?=$row->jumlah??0?>" required>
            </div>
            <div class="mb-3">
                <label for="">Tanggal Pemesanan</label>
                <input type="date" class="form-control" name="tanggal" value="<?=$row->tanggal??date('Y-m-d')?>" required>
            </div>
            <div class="mb-3">
                <label for="">Harga Satuan</label>
                <input type="number" class="form-control" name="harga_satuan" value="1" min="1" value="<?=$row->harga_satuan?>" required>
            </div>
            <div class="mb-3">
                <label for="">Jumlah Bayar</label>
                <input type="number" class="form-control" name="jumlah_bayar" value="1" min="1" value="<?=$row->jumlah_bayar?>" required>
            </div>
            <div class="mb-3">
                <label for="">Metode Pembayaran</label>
                <input type="text" class="form-control" name="pembayaran" value="<?=$row->pembayaran?>" required>
            </div>
            <div class="mb-3">
                <label for="">Tanggal Pembayaran</label>
                <input type="date" class="form-control" name="tanggal_pembayaran" value="<?=$row->tanggal_pembayaran??date('Y-m-d')?>" required>
            </div>
            <button class="btn btn-success">Edit Pesanan</button>
        </form>
        <p></p>
    </div>
</div>