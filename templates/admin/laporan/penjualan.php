<section class="content">
    <div class="container-fluid">
        <?php if(isset($_GET['action']) && $_GET['action'] == 'cetak'): ?>

        <?php else: ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Laporan Penjualan</h1>
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

        <form action="">
            <input type="hidden" name="r" value="admin/laporan/penjualan">
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?=$_GET['tanggal']??date('Y-m-d')?>">
            </div>
            <button class="btn btn-primary" name="action" value="submit">Submit</button>
            <button class="btn btn-success" name="action" value="cetak">Cetak</button>
        </form>

        <p></p>

        <?php endif ?>

        <?php if($rows): ?>
        <?php 
            $total_penjualan = 0;
            $total_produksi  = 0;
            $total_stok_gudang = 0;
            foreach($rows as $key => $value)
                $total_penjualan+=$value->jumlah_telur;
            foreach($produksi_telur as $key => $value)
                $total_produksi+=$value->jumlah;
            foreach($stok_telur as $key => $value)
                $total_stok_gudang+=$value->jumlah;
        ?>

        <div class="table-responsive">
            <?php if(isset($_GET['action']) && $_GET['action'] == 'cetak'): ?>
            <script>window.print()</script>
            <h2 align="center">LAPORAN PENJUALAN</h2>
            <p align="center">Tanggal <?=$_GET['tanggal']?></p>
            <table width="500px" border="1" align="center">
            <?php else: ?>
            <table class="table table-bordered table-striped">
            <?php endif ?>
                <tr>
                    <td>Tanggal</td>
                    <td><?=$_GET['tanggal']?></td>
                </tr>
                <tr>
                    <td>Jumlah Penjualan</td>
                    <td><?=$total_penjualan?></td>
                </tr>
                    <td>Produksi Telur</td>
                    <td><?=$total_produksi?></td>
                </tr>
                <tr>
                    <td>Stok Di Gudang</td>
                    <td><?=$total_stok_gudang?></td>
                </tr>
                <tr>
                    <td>Sisa Produksi</td>
                    <td><?=$total_stok_gudang-$total_penjualan?></td>
                </tr>
            </table>
        </div>
        <?php endif ?>
    </div>
</div>