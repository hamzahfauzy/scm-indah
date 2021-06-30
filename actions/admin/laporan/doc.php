<?php
$conn = get_connection();
$db   = new src\Database($conn);

$rows = [];
if(isset($_GET['tanggal']) && $_GET['tanggal'] != '')
{
    $rows = $db->all('tb_riwayat',[
        'tanggal'=>$_GET['tanggal']
    ]);
}

if(isset($_GET['action']) && $_GET['action'] == 'cetak')
return partial('admin/laporan/doc',[
    'rows' => $rows,
]);

return view('admin/laporan/doc',[
    'rows' => $rows,
]);