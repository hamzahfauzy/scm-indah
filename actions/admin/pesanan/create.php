<?php
$conn    = get_connection();
$db      = new src\Database($conn);

if(request()->isMethod('POST'))
{
    $request = request()->post(false);
    $request['status'] = 'Di Pesan';

    $db->insert('tb_pesanan',$request);

    return redirect()->route('admin/pesanan')->withMessage('success','Data Pesanan Berhasil Disimpan!');
}

return view('admin/pesanan/create');