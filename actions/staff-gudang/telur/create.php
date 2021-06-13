<?php
if(request()->isMethod('POST'))
{
    $conn    = get_connection();
    $request = request()->post(false);
    $db      = new src\Database($conn);
    $request = $request['telur'];
    $request['pengguna_id'] = session()->get('user')->id;

    $db->insert('tb_persediaan_telur',$request);

    return redirect()->route('staff-gudang/telur')->withMessage('success','Data Berhasil Disimpan!');
}

return view('staff-gudang/telur/create');