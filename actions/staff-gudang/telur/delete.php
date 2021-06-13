<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$hapus   = $db->delete('tb_persediaan_telur',[
    'id' => $_GET['id'],
    'pengguna_id' => session()->get('user')->id
]);

if($hapus)
    return redirect()->route('staff-gudang/telur')->withMessage('success','Data Berhasil Dihapus!');
return redirect()->route('staff-gudang/telur')->withMessage('fail','Data Gagal Dihapus!');