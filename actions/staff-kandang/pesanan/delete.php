<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$hapus   = $db->delete('tb_persediaan_ayam',[
    'id' => $_GET['id'],
    'pengguna_id' => session()->get('user')->id
]);

if($hapus)
    return redirect()->route('staff-kandang/ayam')->withMessage('success','Data Berhasil Dihapus!');
return redirect()->route('staff-kandang/ayam')->withMessage('fail','Data Gagal Dihapus!');