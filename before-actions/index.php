<?php

$route = get_route();

if($route != 'auth/login' && !session()->get('user'))
    return redirect()->route('auth/login');

include 'admin.php';

$__LAYOUTS = 'admin/index';
// if(startsWith($route,'admin') || startsWith($route,'staff-kandang') || startsWith($route,'staff-gudang') || startsWith($route,'admin'))
// {
// }

if(startsWith($route,'admin/staff'))
{
    $__NAV_ACTIVE = 'staff';
}

if(startsWith($route,'admin/persediaan'))
{
    $__NAV_ACTIVE = 'persediaan';
}

if(startsWith($route,'admin/persediaan'))
{
    $__NAV_ACTIVE = 'persediaan';
}

if(startsWith($route,'staff-kandang/ayam'))
{
    $__NAV_ACTIVE = 'ayam';
}

if(startsWith($route,'staff-gudang/telur'))
{
    $__NAV_ACTIVE = 'telur';
}

if(startsWith($route,'staff-kasir/penjualan'))
{
    $__NAV_ACTIVE = 'penjualan';
}