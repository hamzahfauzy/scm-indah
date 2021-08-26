<section class="content">
    <div class="container-fluid">
        <?php if(isset($_GET['action']) && $_GET['action'] == 'cetak'): ?>

        <?php else: ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Laporan Persediaan Telur</h1>
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
            <input type="hidden" name="r" value="admin/laporan/telur">
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

        <div class="table-responsive">
            <?php if(isset($_GET['action']) && $_GET['action'] == 'cetak'): ?>
            <script>window.print()</script>
            <h1 align="center">CV. ABADI BERSAMA</h1>
            <hr>
            <h2 align="center">LAPORAN PERSEDIAAN TELUR</h2>
            <p align="center">Tanggal <?=$_GET['tanggal']?></p>
            <table width="100%" border="1">
            <?php else: ?>
            <table class="table table-bordered">
            <?php endif ?>
                <tr>
                    <th rowspan="2" style="text-align:center;">Jenis Telur</th>
                    <th colspan="4" style="text-align:center;">Jumlah Telur</th>
                </tr>
                <?php if(empty($rows)): ?>
                <tr>
                    <td colspan="6"><i>Tidak ada data</i></td>
                </tr>
                <?php else: ?>
                <tr>
                    <td style="text-align:center;">IKAT</td>
                    <td style="text-align:center;">PIRING</td>
                    <td style="text-align:center;">BUTIR</td>
                    <td style="text-align:center;">PECAH</td>
                </tr>
                <?php endif ?>
                <?php 
                $all_total_ikat = 0;
                $all_total_piring = 0;
                $all_total_butir = 0;
                foreach($rows as $key => $value): 
                    $butir = $value->jumlah;
                    $ikat = floor(floor($butir/30) / 10);
                    $ikat = $ikat < 1 ? 0 : $ikat;
                    $all_total_ikat += $ikat;
                    $total_butir_ikat = $ikat * 300;
                    $sisa_butir = $butir-$total_butir_ikat;
                    $piring = floor($sisa_butir/30);
                    $all_total_piring += $piring;
                    $total_butir_piring = $piring*30;
                    $sisa_butir = $sisa_butir-$total_butir_piring;
                    $all_total_butir += $sisa_butir;
                ?>
                <tr>
                    <td><?=$value->jenis_telur?></td>
                    <td><?=$ikat?></td>
                    <td><?=$piring?></td>
                    <td><?=$sisa_butir?></td>
                    <td></td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <td><b>Jumlah Produksi</b></td>
                    <td><?=$all_total_ikat?></td>
                    <td><?=$all_total_piring?></td>
                    <td><?=$all_total_butir?></td>
                    <td></td>
                </tr>
            </table>
            <center>
                <b>Kisaran, <?= date('d-m-Y') ?></b>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <b><u>Phendi Tanata</u></b>
                DIREKTUR
            </center>
        </div>
        <?php endif ?>
    </div>
</div>