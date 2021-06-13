<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$hapus   = $db->delete('tb_penjualan',[
    'id' => $_GET['id'],
    'pengguna_id' => session()->get('user')->id
]);

if($hapus)
    return redirect()->route('staff-kasir/penjualan')->withMessage('success','Data Berhasil Dihapus!');
return redirect()->route('staff-kasir/penjualan')->withMessage('fail','Data Gagal Dihapus!');