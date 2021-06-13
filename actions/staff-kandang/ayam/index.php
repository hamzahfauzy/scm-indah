<?php
$conn = get_connection();
$db   = new src\Database($conn);

$ayam = $db->all('tb_persediaan_ayam');

return view('staff-kandang/ayam/index',[
    'ayam' => $ayam
]);