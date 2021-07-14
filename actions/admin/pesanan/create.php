<?php
$conn    = get_connection();
$db      = new src\Database($conn);

if(request()->isMethod('POST'))
{
    $request = request()->post();

    $db->insert('tb_pesanan',[
        'supplier' => $request->supplier,
        'kode_pesanan' => $request->kode_pesanan,
        'deskripsi' => $request->deskripsi,
        'jumlah' => $request->jumlah,
        'tanggal' => $request->tanggal,
        'status' => 'Di Pesan',
    ]);

    return redirect()->route('admin/pesanan')->withMessage('success','Data Pesanan Berhasil Disimpan!');
}

return view('admin/pesanan/create');