<section class="content">
    <div class="container-fluid">
        <?php if(isset($_GET['action']) && $_GET['action'] == 'cetak'): ?>

        <?php else: ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Laporan Penjualan Telur</h1>
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

        $total_produksi = 0;
        foreach($produksi_telur as $val)
            $total_produksi += $val->jumlah;

        $total_stok = 0;
        foreach($stok_telur as $val)
            $total_stok += $val->jumlah;
        ?>

        <div class="table-responsive">
            <?php if(isset($_GET['action']) && $_GET['action'] == 'cetak'): ?>
            <script>window.print()</script>
            <h2 align="center">LAPORAN PENJUALAN TELUR</h2>
            <p align="center">Tanggal <?=$_GET['tanggal']?></p>
            <table width="100%" border="1" align="center">
            <?php else: ?>
            <table class="table table-bordered table-striped">
            <?php endif ?>
                <tr>
                    <td>Tanggal</td>
                    <td>Nama Pembeli</td>
                    <td>Jenis</td>
                    <td>Banyaknya</td>
                    <td>Harga</td>
                    <td>Jumlah</td>
                </tr>
                <?php 
                $old_name = "";
                $total_terjual = 0;
                $total_harga = 0;
                foreach($rows as $key => $value):
                    $total_terjual+=$value->jumlah_telur;
                    $total_harga+=($value->harga_satuan*$value->jumlah_telur);
                ?>
                <tr>
                    <td><?=$key==0?$_GET['tanggal']:''?></td>
                    <td><?=$old_name!=$value->nama_konsumen?$value->nama_konsumen:''?></td>
                    <td><?=$value->jenis_telur?></td>
                    <td><?=$value->jumlah_telur?></td>
                    <td><?=$value->harga_satuan?></td>
                    <td><?=$value->harga_satuan*$value->jumlah_telur?></td>
                </tr>
                <?php 
                $old_name = $value->nama_konsumen;
                endforeach;
                ?>
                <tr>
                    <td></td>
                    <td style="font-weight:bold">Jual</td>
                    <td></td>
                    <td style="font-weight:bold"><?=$total_terjual?></td>
                    <td></td>
                    <td style="font-weight:bold"><?=$total_harga?></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight:bold">Produksi Telur</td>
                    <td></td>
                    <td style="font-weight:bold"><?=$total_produksi?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight:bold">Stok Gudang</td>
                    <td></td>
                    <td style="font-weight:bold"><?=$total_stok_gudang?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight:bold">Sisa Produksi</td>
                    <td></td>
                    <td style="font-weight:bold"><?=$total_stok_gudang+$total_produksi-$total_terjual?></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <?php endif ?>
    </div>
</div>