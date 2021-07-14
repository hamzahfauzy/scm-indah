<?php
$conn = get_connection();
$db   = new src\Database($conn);

$ayam = $db->all('tb_riwayat',[
    'ayam_id' => $_GET['id']
],[
    'created_at' => 'DESC'
]);

return view('staff-kandang/ayam/riwayat',[
    'ayam' => $ayam
]);