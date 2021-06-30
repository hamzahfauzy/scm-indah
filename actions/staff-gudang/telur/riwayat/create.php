<?php
if(request()->isMethod('POST'))
{
    $conn    = get_connection();
    $request = request()->post(false);
    $db      = new src\Database($conn);
    $request = $request['telur'];
    $request['pengguna_id'] = session()->get('user')->id;

    $db->insert('tb_riwayat_telur',$request);

    $telur = $db->single('tb_telur',[
        'jenis_telur' => $request['jenis_telur']
    ]);
    if($telur)
    {
        $db->update('tb_telur',[
            'jumlah' => $telur->jumlah + $request['jumlah']
        ],[
            'jenis_telur' => $request['jenis_telur'] 
        ]);
    }
    else
        $db->insert('tb_telur',[
            'jenis_telur' => $request['jenis_telur'],
            'jumlah' => $request['jumlah'],
        ]);

    return redirect()->route('staff-gudang/telur/riwayat')->withMessage('success','Data Berhasil Disimpan!');
}

return view('staff-gudang/telur/riwayat/create');