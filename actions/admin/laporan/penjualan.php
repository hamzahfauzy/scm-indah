<?php
$conn = get_connection();
$db   = new src\Database($conn);

$rows = [];
$produksi_telur = [];
$stok_telur = [];
$total_stok_gudang = 0;
if(isset($_GET['tanggal']) && $_GET['tanggal'] != '')
{
    $rows = $db->all('tb_penjualan',[
        'tanggal'=>$_GET['tanggal']
    ],[
        'nama_konsumen' => 'ASC'
    ]);

    $produksi_telur = $db->all('tb_riwayat_telur',[
        'tanggal'=>$_GET['tanggal']
    ]);

    $kemaren = date('Y-m-d', strtotime('-1 day', strtotime($_GET['tanggal'])));
    
    $stok_gudang = $db->all('tb_riwayat_telur',[
        'tanggal'=>$kemaren
    ]);

    $total_penjualan_kemaren = 0;
    $penjualan_kemaren = $db->all('tb_penjualan',[
        'tanggal'=>$kemaren
    ]);

    if($stok_gudang)
    foreach($stok_gudang as $stok)
        $total_stok_gudang += $stok->jumlah;

    if($penjualan_kemaren)
    foreach($penjualan_kemaren as $stok)
        $total_penjualan_kemaren += $stok->jumlah_telur;

    $total_stok_gudang -= $total_penjualan_kemaren;

    $stok_telur = $db->all('tb_stok_telur',[
        'created_at'=>$_GET['tanggal']
    ]);
}

if(isset($_GET['action']) && $_GET['action'] == 'cetak')
return partial('admin/laporan/penjualan',[
    'rows' => $rows,
    'produksi_telur' => $produksi_telur,
    'stok_telur' => $stok_telur,
    'total_stok_gudang' => $total_stok_gudang,
]);

return view('admin/laporan/penjualan',[
    'rows' => $rows,
    'produksi_telur' => $produksi_telur,
    'stok_telur' => $stok_telur,
    'total_stok_gudang' => $total_stok_gudang,
]);