<?php
$conn = get_connection();
$db   = new src\Database($conn);

$staff = $db->all('tb_pengguna');
$kandang = $db->all('tb_kandang');

$doc = 0;
foreach($kandang as $value)
{
    $ayam = $db->single('tb_persediaan_ayam',[
        'kandang_id' => $value->id
    ],[
        'tanggal_masuk' => 'desc'
    ]);

    $doc += $ayam->jumlah;
}

$db->query = "SELECT SUM(jumlah) as total FROM tb_telur";
$telur = $db->exec('single')->total;

return view('admin/home/index',[
    'staff' => count($staff),
    'kandang' => count($kandang),
    'rows' => $kandang,
    'doc' => $doc,
    'telur' => $telur,
]);