<?php
$conn = get_connection();
$db   = new src\Database($conn);

$rows = [];
$produksi_telur = [];
$stok_telur = [];
if(isset($_GET['tanggal']) && $_GET['tanggal'] != '')
{
    $rows = $db->all('tb_penjualan',[
        'tanggal'=>$_GET['tanggal']
    ]);

    $produksi_telur = $db->all('tb_riwayat_telur',[
        'tanggal'=>$_GET['tanggal']
    ]);

    $stok_telur = $db->all('tb_stok_telur',[
        'created_at'=>$_GET['tanggal']
    ]);
}

if(isset($_GET['action']) && $_GET['action'] == 'cetak')
return partial('admin/laporan/penjualan',[
    'rows' => $rows,
    'produksi_telur' => $produksi_telur,
    'stok_telur' => $stok_telur,
]);

return view('admin/laporan/penjualan',[
    'rows' => $rows,
    'produksi_telur' => $produksi_telur,
    'stok_telur' => $stok_telur,
]);