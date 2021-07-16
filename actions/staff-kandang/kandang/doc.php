<?php
$conn = get_connection();
$db   = new src\Database($conn);

$rows = $db->all('tb_pesanan');

return view('staff-kandang/kandang/doc',[
    'rows' => $rows,
]);