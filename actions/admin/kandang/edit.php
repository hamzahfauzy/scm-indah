<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$row    = $db->single('tb_kandang',[
    'id' => $_GET['id']
]);
if(request()->isMethod('POST'))
{
    $request  = request()->post();
    $pengguna = $db->update('tb_kandang',[
        'nomor_kandang' => $request->nomor_kandang,
        'kuota' => $request->kuota,
    ],[
        'id' => $_GET['id']
    ]);


    return redirect()->route('admin/kandang')->withMessage('success','Data Kandang Berhasil Di Update!');
}

return view('admin/kandang/edit',[
    'row' => $row
]);