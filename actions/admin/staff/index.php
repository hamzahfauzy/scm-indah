<?php
$conn = get_connection();
$db   = new src\Database($conn);
$role = $_GET['role'];

$staff = $db->all('tb_pengguna',['role'=>$role]);

return view('admin/staff/index',[
    'staff' => $staff,
    'role'  => $role
]);