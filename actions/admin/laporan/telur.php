<?php
$conn = get_connection();
$db   = new src\Database($conn);

$rows = [];
if(isset($_GET['tanggal']) && $_GET['tanggal'] != '')
{
    $rows = $db->all('tb_riwayat_telur',[
        'tanggal'=>$_GET['tanggal']
    ]);
}

if(isset($_GET['action']) && $_GET['action'] == 'cetak')
return partial('admin/laporan/telur',[
    'rows' => $rows,
]);

return view('admin/laporan/telur',[
    'rows' => $rows,
]);