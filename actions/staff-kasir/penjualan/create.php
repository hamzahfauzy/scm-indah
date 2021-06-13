<?php
if(request()->isMethod('POST'))
{
    $conn    = get_connection();
    $request = request()->post(false);
    $db      = new src\Database($conn);
    $request = $request['penjualan'];
    $request['pengguna_id'] = session()->get('user')->id;

    $db->insert('tb_penjualan',$request);

    return redirect()->route('staff-kasir/penjualan')->withMessage('success','Data Berhasil Disimpan!');
}

return view('staff-kasir/penjualan/create');