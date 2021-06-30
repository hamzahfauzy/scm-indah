<?php
$conn    = get_connection();
$db      = new src\Database($conn);

$ayam = $db->all('tb_persediaan_ayam',[
    'kandang_id' => $_GET['id']
]);

if(request()->isMethod('POST'))
{
    $request = request()->post(false);

    foreach($request['ayam'] as $data)
    {
        $data['tanggal'] = date('Y-m-d');
        $db->insert('tb_riwayat',$data);
        $jumlah = $data['jumlah_ayam'] - $data['mati'];

        $db->update('tb_persediaan_ayam',[
            'jumlah' => $jumlah
        ],[
            'id' => $data['ayam_id']
        ]);
    }

    return redirect()->route('staff-kandang/kandang/riwayat',['id'=>$_GET['id']])->withMessage('success','Data Kandang Berhasil Disimpan!');
}

return view('staff-kandang/kandang/riwayat/create',[
    'ayam' => $ayam
]);