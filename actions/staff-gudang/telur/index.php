<?php
$conn = get_connection();
$db   = new src\Database($conn);

$telur = $db->all('tb_persediaan_telur');

return view('staff-gudang/telur/index',[
    'telur' => $telur
]);