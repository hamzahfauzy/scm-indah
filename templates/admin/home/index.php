<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Staff</span>
                <span class="info-box-number"><?=$staff?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-building"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kandang</span>
                <span class="info-box-number"><?=$kandang?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-crow"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">DOC</span>
                <span class="info-box-number"><?=$doc?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-egg"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Telur</span>
                <span class="info-box-number"><?=$telur?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-12 content-header">
                <h1 class="m-0 text-dark">Notifikasi</h1>
            </div>

            <div class="col-12">
                <?php 
                $conn = get_connection();
                $db   = new src\Database($conn);
                $exists = false;
                foreach($rows as $row): 
                    $ayam = $db->single('tb_persediaan_ayam',[
                        'kandang_id' => $row->id
                    ],[
                        'tanggal_masuk' => 'desc'
                    ]);

                    $now = time(); // or your date as well
                    $your_date = strtotime($ayam->tanggal_masuk);
                    $datediff = $now - $your_date;

                    $usia = round($datediff / (60 * 60 * 24));

                    if($usia <= 600) continue;
                    $exists = true;
                ?>
                <div class="alert alert-warning">
                    <span class="text-strong">Peringatan!</span> 
                    Usia DOC pada kandang <?=$row->nomor_kandang?> telah lebih dari 600 hari. 
                    <?php if(session()->get('user')->role == 'admin'): ?>
                    Klik <a href="index.php?r=admin/pesanan/create">disini</a> untuk memesan DOC
                    <?php endif ?>
                </div>
                <?php endforeach ?>

                <?php if(!$exists): ?>
                <center><i>Tidak ada notifikasi</i></center>
                <?php endif ?>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->