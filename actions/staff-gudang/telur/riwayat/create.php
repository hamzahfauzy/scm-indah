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
        $tanggal = date('Y-m-d',strtotime($telur->created_at));
        $db->update('tb_telur',[
            'jumlah' => $telur->jumlah + $request['jumlah']
        ],[
            'jenis_telur' => $request['jenis_telur'] 
        ]);

        $db->update('tb_stok_telur',[
            'jumlah' => $telur->jumlah + $request['jumlah']
        ],[
            'jenis_telur' => $request['jenis_telur'],
            'created_at' => $tanggal,
        ]);
    }
    else
    {

        $db->insert('tb_telur',[
            'jenis_telur' => $request['jenis_telur'],
            'jumlah' => $request['jumlah'],
        ]);

        $db->insert('tb_stok_telur',[
            'jenis_telur' => $request['jenis_telur'],
            'jumlah' => $request['jumlah'],
            'created_at' => date('Y-m-d'),
        ]);
    }

    return redirect()->route('staff-gudang/telur/riwayat')->withMessage('success','Data Berhasil Disimpan!');
}

return view('staff-gudang/telur/riwayat/create');