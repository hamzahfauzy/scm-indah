<?php
$conn    = get_connection();
$db      = new src\Database($conn);

$telur    = $db->single('tb_riwayat_telur',[
    'id' => $_GET['id'],
]);

$old = $telur->jumlah;

$hapus   = $db->delete('tb_riwayat_telur',[
    'id' => $_GET['id'],
]);

$telur = $db->single('tb_telur',[
    'jenis_telur' => $telur->jenis_telur
]);

$db->update('tb_telur',[
    'jumlah' => ($telur->jumlah-$old)
],[
    'jenis_telur' => $telur->jenis_telur
]);

return redirect()->route('staff-gudang/telur/riwayat')->withMessage('success','Data Berhasil Dihapus!');