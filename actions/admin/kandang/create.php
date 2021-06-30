<?php
if(request()->isMethod('POST'))
{
    $conn    = get_connection();
    $request = request()->post();
    $db      = new src\Database($conn);

    $pengguna    = $db->insert('tb_kandang',[
        'nomor_kandang' => $request->nomor_kandang,
        'kuota' => $request->kuota,
    ]);

    return redirect()->route('admin/kandang')->withMessage('success','Data Kandang Berhasil Disimpan!');
}

return view('admin/kandang/create');