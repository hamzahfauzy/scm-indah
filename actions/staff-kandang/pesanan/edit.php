<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$ayam    = $db->single('tb_persediaan_ayam',[
    'id' => $_GET['id'],
    'pengguna_id' => session()->get('user')->id,
]);
if(!$ayam)
    return redirect()->route('staff-kandang/ayam')->withMessage('fail','Unauthorized!');

if(request()->isMethod('POST'))
{
    $request  = request()->post(false);
    $request  = $request['ayam'];
    $ayam = $db->update('tb_persediaan_ayam',$request,[
        'id' => $_GET['id'],
        'pengguna_id' => session()->get('user')->id,
    ]);

    if($ayam)
        return redirect()->route('staff-kandang/ayam')->withMessage('success','Data Berhasil Di Update!');
    return redirect()->route('staff-kandang/ayam')->withMessage('fail','Data Gagal Di Update!');
}

return view('staff-kandang/ayam/edit',[
    'ayam' => $ayam,
]);