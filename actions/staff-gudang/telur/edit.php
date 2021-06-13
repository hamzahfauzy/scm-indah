<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$telur    = $db->single('tb_persediaan_telur',[
    'id' => $_GET['id'],
    'pengguna_id' => session()->get('user')->id,
]);
if(!$telur)
    return redirect()->route('staff-gudang/telur')->withMessage('fail','Unauthorized!');

if(request()->isMethod('POST'))
{
    $request  = request()->post(false);
    $request  = $request['telur'];
    $telur = $db->update('tb_persediaan_telur',$request,[
        'id' => $_GET['id'],
        'pengguna_id' => session()->get('user')->id,
    ]);

    if($telur)
        return redirect()->route('staff-gudang/telur')->withMessage('success','Data Berhasil Di Update!');
    return redirect()->route('staff-gudang/telur')->withMessage('fail','Data Gagal Di Update!');
}

return view('staff-gudang/telur/edit',[
    'telur' => $telur,
]);