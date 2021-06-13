<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$user    = $db->delete('tb_pengguna',[
    'id' => $_GET['id']
]);
$role    = $_GET['role'];

return redirect()->route('admin/staff',['role'=>$role])->withMessage('success','Data '.get_role($role).' Berhasil Dihapus!');