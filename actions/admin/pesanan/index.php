<?php
$conn = get_connection();
$db   = new src\Database($conn);

$rows = $db->all('tb_pesanan');

return view('admin/pesanan/index',[
    'rows' => $rows,
]);