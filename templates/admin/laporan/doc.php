<section class="content">
    <div class="container-fluid">
        <?php if(isset($_GET['action']) && $_GET['action'] == 'cetak'): ?>

        <?php else: ?>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Laporan DOC</h1>
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
            <input type="hidden" name="r" value="admin/laporan/doc">
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
            <h2 align="center">LAPORAN DOC</h2>
            <p align="center">Tanggal <?=$_GET['tanggal']?></p>
            <table width="100%" border="1">
            <?php else: ?>
            <table class="table table-bordered table-striped">
            <?php endif ?>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Kandang</th>
                        <th>Jumlah Ayam</th>
                        <th>Sakit</th>
                        <th>Mati</th>
                        <th>Produk</th>
                        <th>%</th>
                        <th>Ikat</th>
                        <th>Piring</th>
                        <th>Butir</th>
                        <th>Pecah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($rows)): ?>
                    <tr>
                        <td colspan="10"><i>Tidak ada data</i></td>
                    </tr>
                    <?php endif ?>
                    <?php 
                    $conn = get_connection();
                    $db   = new src\Database($conn);
                    $total_persen = 0;
                    foreach($rows as $key => $value): 
                        $kandang = $db->single('tb_kandang',[
                            'id' => $value->kandang_id
                        ]);
                        $persen = $value->produk/$value->jumlah_ayam*100;
                        $total_persen += $persen;
                    ?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$kandang->nomor_kandang?></td>
                        <td><?=$value->jumlah_ayam?></td>
                        <td><?=$value->sakit?></td>
                        <td><?=$value->mati?></td>
                        <td><?=$value->produk?></td>
                        <td><?=number_format($persen)?></td>
                        <td><?=$value->ikat?></td>
                        <td><?=$value->piring?></td>
                        <td><?=$value->butir?></td>
                        <td><?=$value->pecah?></td>
                    </tr>
                    <?php endforeach ?>

                    <?php
                    $db->query = "SELECT 
                                    SUM(jumlah_ayam) as total_jumlah_ayam,
                                    SUM(sakit) as total_sakit,
                                    SUM(mati) as total_mati,
                                    SUM(produk) as total_produk,
                                    SUM(ikat) as total_ikat,
                                    SUM(piring) as total_piring,
                                    SUM(butir) as total_butir,
                                    SUM(pecah) as total_pecah
                                  FROM tb_riwayat WHERE tanggal = '$_GET[tanggal]'";
                    $stats = $db->exec('single');
                    ?>
                    <tr>
                        <td></td>
                        <td><b>Total</b></td>
                        <td><?=$stats->total_jumlah_ayam?></td>
                        <td><?=$stats->total_sakit?></td>
                        <td><?=$stats->total_mati?></td>
                        <td><?=$stats->total_produk?></td>
                        <td><?=number_format($total_persen)?></td>
                        <td><?=$stats->total_ikat?></td>
                        <td><?=$stats->total_piring?></td>
                        <td><?=$stats->total_butir?></td>
                        <td><?=$stats->total_pecah?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php endif ?>
    </div>
</div>