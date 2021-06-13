<?php
$conn = get_connection();
$db   = new src\Database($conn);

$penjualan = $db->all('tb_penjualan');

return view('staff-kasir/penjualan/index',[
    'penjualan' => $penjualan
]);