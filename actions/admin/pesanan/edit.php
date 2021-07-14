<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$row    = $db->single('tb_pesanan',[
    'id' => $_GET['id']
]);

if(request()->isMethod('POST'))
{
    $request  = request()->post();
    $db->update('tb_pesanan',[
        'supplier' => $request->supplier,
        'kode_pesanan' => $request->kode_pesanan,
        'deskripsi' => $request->deskripsi,
        'jumlah' => $request->jumlah,
        'tanggal' => $request->tanggal,
    ],[
        'id' => $_GET['id']
    ]);


    return redirect()->route('admin/pesanan')->withMessage('success','Data Pesanan Berhasil Di Update!');
}

return view('admin/pesanan/edit',[
    'row' => $row,
]);