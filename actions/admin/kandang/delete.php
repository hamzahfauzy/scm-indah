<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$user    = $db->delete('tb_kandang',[
    'id' => $_GET['id']
]);

return redirect()->route('admin/kandang')->withMessage('success','Data Kandang Berhasil Dihapus!');