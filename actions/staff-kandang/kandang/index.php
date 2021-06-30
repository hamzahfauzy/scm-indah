<?php
$conn = get_connection();
$db   = new src\Database($conn);

$rows = $db->all('tb_kandang');

return view('staff-kandang/kandang/index',[
    'rows' => $rows,
]);