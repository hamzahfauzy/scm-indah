<?php
if(request()->isMethod('POST'))
{
    $conn    = get_connection();
    $request = request()->post(false);
    $db      = new src\Database($conn);
    $request = $request['ayam'];
    $request['pengguna_id'] = session()->get('user')->id;

    $db->insert('tb_persediaan_ayam',$request);

    return redirect()->route('staff-kandang/ayam')->withMessage('success','Data Berhasil Disimpan!');
}

return view('staff-kandang/ayam/create');