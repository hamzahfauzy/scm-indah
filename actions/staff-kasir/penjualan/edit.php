<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$penjualan    = $db->single('tb_penjualan',[
    'id' => $_GET['id'],
    'pengguna_id' => session()->get('user')->id,
]);
if(!$penjualan)
    return redirect()->route('staff-kasir/penjualan')->withMessage('fail','Unauthorized!');

if(request()->isMethod('POST'))
{
    $request  = request()->post(false);
    $request  = $request['penjualan'];
    $penjualan = $db->update('tb_penjualan',$request,[
        'id' => $_GET['id'],
        'pengguna_id' => session()->get('user')->id,
    ]);

    if($penjualan)
        return redirect()->route('staff-kasir/penjualan')->withMessage('success','Data Berhasil Di Update!');
    return redirect()->route('staff-kasir/penjualan')->withMessage('fail','Data Gagal Di Update!');
}

return view('staff-kasir/penjualan/edit',[
    'penjualan' => $penjualan,
]);