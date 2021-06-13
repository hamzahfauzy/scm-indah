<?php
if(request()->isMethod('POST'))
{
    $conn    = get_connection();
    $request = request()->post();
    $db      = new src\Database($conn);

    $pengguna    = $db->insert('tb_pengguna',[
        'username' => $request->username,
        'password' => md5($request->password),
        'role'     => $request->role
    ]);

    $staff = $db->insert('tb_staff',[
        'pengguna_id'   => $pengguna->id,
        'kode_karyawan' => $request->kode_karyawan,
        'nama'          => $request->nama,
        'alamat'        => $request->alamat,
        'no_hp'         => $request->no_hp,
        'tanggal_masuk_kerja' => $request->tanggal_masuk_kerja,
    ]);

    if($staff)
        return redirect()->route('admin/staff',['role' => $request->role])->withMessage('success','Data '.get_role($request->role).' Berhasil Disimpan!');
    return redirect()->route('admin/staff',['role' => $request->role])->withMessage('fail','Data '.get_role($request->role).' Gagal Disimpan!');
}

return view('admin/staff/create',[
    'role' => $_GET['role']
]);