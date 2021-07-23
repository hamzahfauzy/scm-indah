<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$row    = $db->single('tb_pesanan',[
    'id' => $_GET['id']
]);

$kandang = $db->all('tb_kandang',[
    'kuota' => ['>=',$row->jumlah]
]);

if(request()->isMethod('POST'))
{
    $request  = request()->post();
    $db->update('tb_pesanan',[
        'kandang_id' => $request->kandang_id,
        'status' => 'Sampai',
        'tanggal_sampai' => $request->tanggal_sampai,
        'usia' => $request->usia,
        'updated_at' => date('Y-m-d H:i:s'),
    ],[
        'id' => $_GET['id']
    ]);

    $ayam = $db->insert('tb_persediaan_ayam',[
        'kandang_id' => $request->kandang_id,
        'jumlah' => $row->jumlah,
        'tanggal_masuk' => date('Y-m-d H:i:s'),
    ]);

    $db->insert('tb_riwayat',[
        'kandang_id' => $request->kandang_id,
        'ayam_id'    => $ayam->id,
        'pengguna_id' => session()->get('user')->id,
        'tanggal' => date('Y-m-d H:i:s'),
        'jumlah_ayam' => $row->jumlah,
        'keterangan' => 'DOC Masuk',
    ]);


    return redirect()->route('admin/pesanan')->withMessage('success','Data Pesanan Berhasil Di Update!');
}

return view('admin/pesanan/sampai',[
    'kandang' => $kandang,
    'row' => $row,
]);