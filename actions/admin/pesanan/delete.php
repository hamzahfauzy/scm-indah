<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$user    = $db->delete('tb_pesanan',[
    'id' => $_GET['id']
]);

return redirect()->route('admin/pesanan')->withMessage('success','Data Pesanan Berhasil Dihapus!');