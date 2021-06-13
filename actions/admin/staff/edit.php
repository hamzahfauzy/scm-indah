<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$pengguna    = $db->single('tb_pengguna',[
    'id' => $_GET['id']
]);
$staff    = $db->single('tb_staff',[
    'pengguna_id' => $_GET['id']
]);
$role    = $_GET['role'];
if(request()->isMethod('POST'))
{
    $request  = request()->post();
    $password = $request->password ? md5($request->password) : $pengguna->password;
    $pengguna = $db->update('tb_pengguna',[
        'username' => $request->username,
        'password' => $password,
    ],[
        'id' => $_GET['id']
    ]);

    $staff = $db->update('tb_staff',[
        'kode_karyawan' => $request->kode_karyawan,
        'nama'          => $request->nama,
        'alamat'        => $request->alamat,
        'no_hp'         => $request->no_hp,
        'tanggal_masuk_kerja' => $request->tanggal_masuk_kerja,
    ],[
        'pengguna_id' => $_GET['id']
    ]);

    if($staff)
        return redirect()->route('admin/staff',['role' => $role])->withMessage('success','Data '.get_role($role).' Berhasil Di Update!');
    return redirect()->route('admin/staff',['role' => $role])->withMessage('fail','Data '.get_role($role).' Gagal Di Update!');
}

return view('admin/staff/edit',[
    'pengguna' => $pengguna,
    'staff' => $staff,
    'role'  => $role
]);