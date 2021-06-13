<section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Data Penjualan</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="index.php?r=staff-kasir/penjualan" class="btn btn-sm btn-primary">Kembali</a>
                </div>
            </div>
        </div>

        <form action="" method="post" class="row">
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" name="penjualan[tanggal]" required>
                </div>
                <div class="mb-3">
                    <label for="">Nama Konsumen</label>
                    <input type="text" class="form-control" name="penjualan[nama_konsumen]" required>
                </div>
                <div class="mb-3">
                    <label for="">Jenis Telur</label>
                    <select name="penjualan[jenis_telur]" id="" class="form-control" required>
                        <option value="">- Pilih -</option>
                        <?php foreach(['A+', 'A', 'B', 'C', 'D', 'E'] as $val): ?>
                        <option value="<?=$val?>"><?=$val?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Jumlah Telur</label>
                    <input type="number" class="form-control" id="jumlah_telur" name="penjualan[jumlah_telur]" onkeyup="updateTotal()" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label for="">Harga Satuan</label>
                    <input type="number" class="form-control" id="harga_satuan" name="penjualan[harga_satuan]" onkeyup="updateTotal()" required>
                </div>
                <div class="mb-3">
                    <label for="">Total</label>
                    <input type="text" id="total" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="">Nominal Pembayaran</label>
                    <input type="number" class="form-control" id="nominal_pembayaran" name="penjualan[nominal_pembayaran]" onkeyup="updateKembalian()" required>
                </div>
                <div class="mb-3">
                    <label for="">Kembalian</label>
                    <input type="text" id="kembalian" class="form-control" readonly>
                </div>
            </div>
            <div class="col-12">
            <button class="btn btn-success">Simpan</button>
            </div>
        </form>
        <p></p>
    </div>
</div>
<script>
function updateTotal()
{
    var jumlah = document.getElementById('jumlah_telur').value
    var harga = document.getElementById('harga_satuan').value

    if(jumlah && harga)
    {
        document.getElementById('total').value = jumlah*harga
    }
}

function updateKembalian()
{
    var total = document.getElementById('total').value
    var pembayaran = document.getElementById('nominal_pembayaran').value

    if(total && pembayaran)
    {
        document.getElementById('kembalian').value = pembayaran-total
    }
}
</script>