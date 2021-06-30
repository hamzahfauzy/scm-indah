<?php
$conn = get_connection();
$db   = new src\Database($conn);

$kandang = $db->single('tb_kandang',[
    'id' => $_GET['id']
]);

$riwayat = $db->all('tb_riwayat',[
    'kandang_id' => $_GET['id']
],[
    'created_at' => 'DESC'
]);

return view('staff-kandang/kandang/riwayat/index',[
    'kandang' => $kandang,
    'riwayat' => $riwayat,
]);