<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$row    = $db->single('tb_pesanan',[
    'id' => $_GET['id']
]);

if(request()->isMethod('POST'))
{
    $request  = request()->post(false);
    $db->update('tb_pesanan',$request,[
        'id' => $_GET['id']
    ]);


    return redirect()->route('admin/pesanan')->withMessage('success','Data Pesanan Berhasil Di Update!');
}

return view('admin/pesanan/edit',[
    'row' => $row,
]);