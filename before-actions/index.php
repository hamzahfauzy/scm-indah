<?php

$route = get_route();

if($route != 'auth/login' && !session()->get('user'))
    return redirect()->route('auth/login');

include 'admin.php';

$__LAYOUTS = 'admin/index';
// if(startsWith($route,'admin') || startsWith($route,'staff-kandang') || startsWith($route,'staff-gudang') || startsWith($route,'admin'))
// {
// }

$navs = [
    'admin/staff' => 'staff',
    'admin/kandang' => 'kandang',
    'admin/persediaan' => 'persediaan',
    'admin/pesanan' => 'pesanan',
    'admin/laporan' => 'laporan',
    'staff-kandang/ayam' => 'ayam',
    'staff-kandang/kandang' => 'kandang',
    'staff-gudang/telur' => 'telur',
    'staff-kasir/penjualan' => 'penjualan',
];

foreach($navs as $k => $v)
{
    if(startsWith($route,$k))
    {
        $__NAV_ACTIVE = $v;
        break;
    }

}