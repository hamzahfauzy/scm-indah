<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Data Riwayat</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=staff-kandang/ayam" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <form action="" method="post" class="col-12">
            <table class="table table-bordered">
                <tr>
                    <td>Tanggal Masuk</td>
                    <td>Jumlah</td>
                    <td>Sakit</td>
                    <td>Mati</td>
                    <td>Produk</td>
                    <td>Ikat</td>
                    <td>Piring</td>
                    <td>Butir</td>
                    <td>Pecah</td>
                    <td>Keterangan</td>
                </tr>
                <?php foreach($ayam as $value): ?>
                <tr>
                    <td>
                    <input type="hidden" name="ayam[<?=$value->id?>][kandang_id]" value="<?=$_GET['id']?>">
                    <input type="hidden" name="ayam[<?=$value->id?>][ayam_id]" value="<?=$value->id?>">
                    <input type="hidden" name="ayam[<?=$value->id?>][pengguna_id]" value="<?=session()->get('user')->id?>">
                    <?=$value->tanggal_masuk?>
                    </td>
                    <td>
                        <input type="number" name="ayam[<?=$value->id?>][jumlah_ayam]" class="form-control" value="<?=$value->jumlah?>">
                    </td>
                    <td>
                        <input type="number" name="ayam[<?=$value->id?>][sakit]" class="form-control" value="0" min="0">
                    </td>
                    <td>
                        <input type="number" name="ayam[<?=$value->id?>][mati]" class="form-control" value="0" min="0">
                    </td>
                    <td>
                        <input type="number" name="ayam[<?=$value->id?>][produk]" class="form-control" value="0" min="0">
                    </td>
                    <td>
                        <input type="number" name="ayam[<?=$value->id?>][ikat]" class="form-control" value="0" min="0">
                    </td>
                    <td>
                        <input type="number" name="ayam[<?=$value->id?>][piring]" class="form-control" value="0" min="0">
                    </td>
                    <td>
                        <input type="number" name="ayam[<?=$value->id?>][butir]" class="form-control" value="0" min="0">
                    </td>
                    <td>
                        <input type="number" name="ayam[<?=$value->id?>][pecah]" class="form-control" value="0" min="0">
                    </td>
                    <td>
                        <input type="text" name="ayam[<?=$value->id?>][keterangan]" class="form-control" value="-">
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            <button class="btn btn-success">Simpan</button>
        </form>
        <p></p>
    </div>
</div>