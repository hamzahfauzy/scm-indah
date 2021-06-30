<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$telur    = $db->single('tb_riwayat_telur',[
    'id' => $_GET['id'],
    'pengguna_id' => session()->get('user')->id,
]);
if(!$telur)
    return redirect()->route('staff-gudang/telur/riwayat')->withMessage('fail','Unauthorized!');

if(request()->isMethod('POST'))
{
    $request  = request()->post(false);
    $request  = $request['telur'];
    $db->update('tb_riwayat_telur',$request,[
        'id' => $_GET['id'],
        'pengguna_id' => session()->get('user')->id,
    ]);

    $old = $telur->jumlah;

    $telur = $db->single('tb_telur',[
        'jenis_telur' => $request['jenis_telur']
    ]);

    $db->update('tb_telur',[
        'jumlah' => ($telur->jumlah-$old) + $request['jumlah']
    ],[
        'jenis_telur' => $request['jenis_telur']
    ]);

    return redirect()->route('staff-gudang/telur/riwayat')->withMessage('success','Data Berhasil Di Update!');
}

return view('staff-gudang/telur/riwayat/edit',[
    'telur' => $telur,
]);