<?php
$conn = get_connection();
$db   = new src\Database($conn);

$pesanan = $db->all('tb_pesanan');

return view('staff-kandang/pesanan/index',[
    'pesanan' => $pesanan
]);