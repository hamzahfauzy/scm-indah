<?php
$conn    = get_connection();
$db      = new src\Database($conn);

$riwayat = $db->single('tb_riwayat',[
    'id' => $_GET['id']
]);

$db->update('tb_persediaan_ayam',[
    'jumlah' => $riwayat->jumlah_ayam
],[
    'id' => $riwayat->ayam_id
]);

$db->delete('tb_riwayat',[
    'id' => $_GET['id']
]);

return redirect()->route('staff-kandang/kandang/riwayat',['id'=>$riwayat->kandang_id])->withMessage('success','Data Kandang Berhasil Di Hapus!');